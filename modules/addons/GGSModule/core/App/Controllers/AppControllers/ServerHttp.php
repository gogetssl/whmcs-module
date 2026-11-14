<?php

namespace ModulesGarden\GGSModule\Core\App\Controllers\AppControllers;

use ModulesGarden\GGSModule\Core\Contracts\Controllers\AppControllerInterface;
use ModulesGarden\GGSModule\Core\ModuleConstants;

class ServerHttp extends \ModulesGarden\GGSModule\Core\App\Controllers\AppController implements AppControllerInterface
{
    public function getControllerInstanceClass($callerName, $params)
    {
        $functionName = strtolower(str_replace(ModuleConstants::getModuleName() . '_', '', $callerName));

        switch ($functionName)
        {
            case 'clientarea':
                return $params['model'] instanceof \WHMCS\Service\Addon ?
                    \ModulesGarden\GGSModule\Core\App\Controllers\Instances\Server\ClientPageProductAddonController::class :
                    \ModulesGarden\GGSModule\Core\App\Controllers\Instances\Server\ClientPageController::class ;
            default:
                throw new \Exception($functionName . ' is not implemented in ' . __CLASS__);
        }

        return null;
    }
}
