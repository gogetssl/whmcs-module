<?php

namespace ModulesGarden\ggsmodule\Core\App\Controllers\AppControllers;

use ModulesGarden\ggsmodule\Core\App\Controllers\Instances\AddonController;
use ModulesGarden\ggsmodule\Core\Contracts\Controllers\AppControllerInterface;
use ModulesGarden\ggsmodule\Core\ModuleConstants;

class Addon extends \ModulesGarden\ggsmodule\Core\App\Controllers\AppController implements AppControllerInterface
{
    public function getControllerInstanceClass($callerName, $params)
    {
        $functionName = str_replace(ModuleConstants::getModuleName() . '_', '', $callerName);


        $coreAddon = '\ModulesGarden\ggsmodule\Core\App\Controllers\Instances\Addon\\' . ucfirst($functionName);
        if (class_exists($coreAddon) && is_subclass_of($coreAddon, AddonController::class))
        {
            return $coreAddon;
        }

        $appAddon = '\ModulesGarden\ggsmodule\App\Http\Actions\\' . ucfirst($functionName);
        if (class_exists($appAddon) && is_subclass_of($appAddon, AddonController::class))
        {
            return $appAddon;
        }

        return null;
    }
}
