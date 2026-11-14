<?php

namespace ModulesGarden\GGSModule\Core\WHMCS\URL;

class Client
{
    public static function productDetails(int $hostingId, array $parameters = [])
    {
        $parameters['action'] = 'productdetails';
        $parameters['id'] = $hostingId;

        return \ModulesGarden\GGSModule\Core\Routing\Url::clientarea('clientarea.php', $parameters);
    }
}