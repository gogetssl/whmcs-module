<?php

namespace ModulesGarden\Servers\GGSModule\app\services;

use ModulesGarden\GGSModule\App\Libs\CertificateSyncHelpers;
use ModulesGarden\GGSModule\App\Repositories\Whmcs\AddonModuleRepository;

/**
 * Admin "Sync Certificate" button - the SSLCertificates cron flow for a single service,
 * without checking the /services/updates request.
 */
class SyncCertificate
{
    public function run($params)
    {
        $gatewayType = \ModulesGarden\GGSModule\App\Libs\GatewayOrderService::typeOfService($params['serviceid']);
        if($gatewayType)
        {
            $gatewayType::refresh($params['serviceid']);

            return 'success';
        }

        $certificate = CertificateSyncHelpers::getCertificatesQuery()
            ->where('tblhosting.id', $params['serviceid'])
            ->first();

        if(!$certificate)
        {
            throw new \Exception('The certificate can be synchronized only for an Active service with the "Configuration Submitted" SSL order status');
        }

        $addonConfig = (new AddonModuleRepository())->getModuleConfiguration();

        CertificateSyncHelpers::syncCertificate($certificate->toArray(), $addonConfig);

        return 'success';
    }
}
