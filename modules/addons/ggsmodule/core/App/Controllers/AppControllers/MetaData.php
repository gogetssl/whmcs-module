<?php

namespace ModulesGarden\GGSModule\Core\App\Controllers\AppControllers;

use ModulesGarden\GGSModule\Core\App\Controllers\Instances\AddonController;
use ModulesGarden\GGSModule\Core\Contracts\Controllers\AppControllerInterface;
use ModulesGarden\GGSModule\Core\ModuleConstants;

class MetaData extends \ModulesGarden\GGSModule\Core\App\Controllers\AppController implements AppControllerInterface
{
    public function __construct(array $params = [])
    {
        //override parent, do not populate params
    }
    public function getControllerInstanceClass($callerName, $params)
    {
        $functionName = str_replace(ModuleConstants::getModuleName() . '_', '', $callerName);

        $coreAddon = '\ModulesGarden\GGSModule\Core\App\Controllers\Instances\Addon\\' . ucfirst($functionName);
        if (class_exists($coreAddon) && is_subclass_of($coreAddon, AddonController::class))
        {
            return $coreAddon;
        }

        $appAddon = '\ModulesGarden\GGSModule\App\Http\Actions\\' . ucfirst($functionName);
        if (class_exists($appAddon) && is_subclass_of($appAddon, AddonController::class))
        {
            return $appAddon;
        }

        return null;
    }
}
