<?php

namespace ModulesGarden\GGSModule\Core\WHMCS;

use ModulesGarden\GGSModule\Core\ModuleConstants;

class ModuleParamsBuilder
{
    public static function get($relId)
    {
        if (!function_exists('ModuleBuildParams'))
        {
            require_once ModuleConstants::getFullPathWhmcs('includes') . DIRECTORY_SEPARATOR . "modulefunctions.php";
        }

        return \ModuleBuildParams($relId);
    }
}