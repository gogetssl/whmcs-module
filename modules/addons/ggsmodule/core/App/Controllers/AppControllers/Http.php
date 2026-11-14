<?php

namespace ModulesGarden\GGSModule\Core\App\Controllers\AppControllers;

use ModulesGarden\GGSModule\Core\App\Controllers\Instances\Http\AdminPageController;
use ModulesGarden\GGSModule\Core\App\Controllers\Instances\Http\ClientPageController;
use ModulesGarden\GGSModule\Core\Contracts\Controllers\AppControllerInterface;
use ModulesGarden\GGSModule\Core\ModuleConstants;

class Http extends \ModulesGarden\GGSModule\Core\App\Controllers\AppController implements AppControllerInterface
{
    public function getControllerInstanceClass($callerName, $params)
    {
        $functionName = strtolower(str_replace(ModuleConstants::getModuleName() . '_', '', $callerName));
        switch ($functionName)
        {
            //HTTP controllers
            case 'output':
                return AdminPageController::class;
            case 'clientarea':
                return ClientPageController::class;
        }

        return null;
    }
}
