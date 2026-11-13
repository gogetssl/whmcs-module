<?php

namespace ModulesGarden\Servers\ggsmodule\app\services;

use ModulesGarden\Servers\ggsmodule\app\models\whmcs\SSL;
use ModulesGarden\Servers\ggsmodule\app\repository\whmcs\Config;
use ModulesGarden\Servers\ggsmodule\Configuration;
use ModulesGarden\ggsmodule\App\Helpers\EmailTemplates;
use ModulesGarden\ggsmodule\App\Libs\AcmeHelpers;
use ModulesGarden\ggsmodule\App\Libs\Helpers;

class CreateAccount {


    public function run($params)
    {
        $whmcsProductId = $params['pid'];
        $serviceId = $params['serviceid'];
        $userId = $params['userid'];

        $serviceSSL = SSL::getByServiceId($serviceId);
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
        if(isset($_SESSION['ggsmodule']['importedServices']) && is_array($_SESSION['ggsmodule']['importedServices']) && in_array($serviceId, $_SESSION['ggsmodule']['importedServices']))
        {
            $key = array_search($serviceId, $_SESSION['ggsmodule']['importedServices']);
            unset($_SESSION['ggsmodule']['importedServices'][$key]);
            return 'success';
        }

        if(AcmeHelpers::isAcmeWhmcsProduct($whmcsProductId))
        {
            EmailTemplates::sendEmail(EmailTemplates::SUBSCRIPTION_TEMPLATE, $serviceId, [
                'ssl_configuration_link' => (new Config())->getConfigureSSLUrl($sslId, $serviceId),
            ]);

            return 'success';
        }

        $gatewayType = \ModulesGarden\ggsmodule\App\Libs\GatewayOrderService::typeOfProduct($whmcsProductId);

        // CodeGuard has nothing for the client to fill in: the licence is ordered straight away from the client's own
        // name and e-mail address, and everything after that happens in the CodeGuard dashboard. A failed order leaves
        // the service waiting, and the client page offers to order again.
        if($gatewayType === \ModulesGarden\ggsmodule\App\Libs\CodeGuardService::class)
        {
            $ordered = true;
            try
            {
                // WHMCS sets the service to Active only after this function returns, hence the setup flag
                \ModulesGarden\ggsmodule\App\Libs\CodeGuardService::create($serviceId, [], true);
            }
            catch(\Throwable $e)
            {
                $ordered = false;
                \ModulesGarden\ggsmodule\App\Libs\CertificateService::event($serviceId, 'error', 'CodeGuard licence could not be ordered: ' . $e->getMessage());
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