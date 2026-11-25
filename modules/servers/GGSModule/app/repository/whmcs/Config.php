<?php

namespace GGSModule\Server\app\repository\whmcs;

use GGSModule\Server\app\models\whmcs\Service;
use GGSModule\App\Libs\Subscriptions\AcmeHelpers;
use GGSModule\App\Libs\Subscriptions\AisHelpers;
use WHMCS\Database\Capsule as DataBase;

class Config
{
    public function getConfigureSSLUrl($id, $serviceID = null)
    {
        $service = Service::find($serviceID);

        if($service && AcmeHelpers::isAcmeWhmcsProduct($service->packageid))
        {
            $WHMCSUrl = $this->getBrandURL($serviceID);
            return $WHMCSUrl . '/clientarea.php?action=productdetails&id=' . $service->id . '&acmeconfig=1';
        }

        if($service && \GGSModule\App\Libs\ProductLines\GatewayOrderService::typeOfProduct($service->packageid))
        {
            return $this->getBrandURL($serviceID) . '/clientarea.php?action=productdetails&id=' . $service->id . '&smimeconfig=1';
        }

        if($service && AisHelpers::isAisWhmcsProduct($service->packageid))
        {
            $WHMCSUrl = $this->getBrandURL($serviceID);
            return $WHMCSUrl . '/configuressl.php?cert=' . md5($id);
        }

        if($service)
        {
            // Module SSL configuration page (AutoInstall via cPanel / Manual)
            $WHMCSUrl = $this->getBrandURL($serviceID);
            return $WHMCSUrl . '/clientarea.php?action=productdetails&id=' . $service->id . '&configssl=1';
        }

        $WHMCSUrl = $this->getBrandURL($serviceID);
        return $WHMCSUrl . '/configuressl.php?cert=' . md5($id);
    }

    public function getBrandURL($id)
    {
        // one WHMCS, one address: the service id is kept in the signature for a per-brand address later
        $configuration = DataBase::table('tblconfiguration')->where('setting', 'SystemURL')->first();

        return rtrim((string)($configuration->value ?? ''), '/');
    }

}
