<?php

namespace GGSModule\Server\app\services;

use GGSModule\Server\app\models\whmcs\SSL;
use GGSModule\Server\app\repository\whmcs\Config;
use GGSModule\Server\Configuration;
use GGSModule\App\Helpers\EmailTemplates;
use GGSModule\App\Libs\Subscriptions\AcmeHelpers;

class CreateAccount {


    public function run($params)
    {
        $whmcsProductId = $params['pid'];
        $serviceId = $params['serviceid'];
        $userId = $params['userid'];

        $imported = isset($_SESSION['GGSModule']['importedServices']) && is_array($_SESSION['GGSModule']['importedServices'])
            && in_array($serviceId, $_SESSION['GGSModule']['importedServices']);

        // TLS certificate: bought at once without its details - the gateway returns the certificate token, shown to
        // the client to complete the order here or in any plugin (cPanel, Plesk ...). When the gateway refuses it
        // (balance, product) nothing is stored and the error is returned: WHMCS keeps the service Pending and the
        // admin runs Module Create again.
        $serviceSSL = SSL::getByServiceId($serviceId);
        if (!$imported && \GGSModule\App\Libs\Certificates\IncompleteOrder::appliesTo($whmcsProductId)
            && (is_null($serviceSSL) || ($serviceSSL->status === 'Awaiting Configuration' && empty($serviceSSL->remoteid)))) {
            \GGSModule\App\Libs\Certificates\IncompleteOrder::ensure($serviceId, $whmcsProductId, $params['model']->billingcycle,
                \GGSModule\App\Libs\Billing\SanUpgrade::paidQuantities($params));
        }

        if (!is_null($serviceSSL)) {
            // A migrated legacy service ("setup on order" products) already has its row: adopt it instead of failing
            if ($serviceSSL->status === 'Awaiting Configuration' && empty($serviceSSL->remoteid)) {
                SSL::where('id', $serviceSSL->id)->update(['module' => (new Configuration())->systemName]);
                $sslId = $serviceSSL->id;
            } else {
                throw new \Exception('The SSL order has already been created');
            }
        } else {
            $sslId = SSL::insertGetId([
                'userid' => $userId,
                'serviceid' => $serviceId,
                'remoteid' => '',
                'module' => (new Configuration())->systemName,
                'certtype' => '',
                'completiondate' => '',
                'status' => 'Awaiting Configuration'
            ]);
        }
        if($imported)
        {
            $key = array_search($serviceId, $_SESSION['GGSModule']['importedServices']);
            unset($_SESSION['GGSModule']['importedServices'][$key]);
            return 'success';
        }

        if(AcmeHelpers::isAcmeWhmcsProduct($whmcsProductId))
        {
            EmailTemplates::sendEmail(EmailTemplates::SUBSCRIPTION_TEMPLATE, $serviceId, [
                'ssl_configuration_link' => (new Config())->getConfigureSSLUrl($sslId, $serviceId),
            ]);

            return 'success';
        }

        $gatewayType = \GGSModule\App\Libs\ProductLines\GatewayOrderService::typeOfProduct($whmcsProductId);

        // CodeGuard has nothing for the client to fill in: the licence is ordered straight away from the client's own
        // name and e-mail address, and everything after that happens in the CodeGuard dashboard. A failed order leaves
        // the service waiting, and the client page offers to order again.
        if($gatewayType === \GGSModule\App\Libs\ProductLines\CodeGuardService::class)
        {
            $ordered = true;
            try
            {
                // WHMCS sets the service to Active only after this function returns, hence the setup flag
                \GGSModule\App\Libs\ProductLines\CodeGuardService::create($serviceId, [], true);
            }
            catch(\Throwable $e)
            {
                $ordered = false;
                \GGSModule\App\Libs\Certificates\CertificateService::event($serviceId, 'error', 'CodeGuard licence could not be ordered: ' . $e->getMessage());
            }

            // "your licence is ready" only when it is; otherwise the client is pointed at the page, which offers to order
            EmailTemplates::sendEmail($ordered ? $gatewayType::configurationTemplate() : EmailTemplates::CONFIGURATION_TEMPLATE, $serviceId, [
                'ssl_configuration_link' => (new Config())->getConfigureSSLUrl($sslId, $serviceId),
            ]);

            return 'success';
        }

        $template = $gatewayType ? $gatewayType::configurationTemplate() : EmailTemplates::CONFIGURATION_TEMPLATE;
        EmailTemplates::sendEmail($template, $serviceId, [
            'ssl_configuration_link' => (new Config())->getConfigureSSLUrl($sslId, $serviceId),
        ]);

        return 'success';
    }
}
