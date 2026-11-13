<?php

namespace ModulesGarden\ggsmodule\Core\WHMCS;

use ModulesGarden\ggsmodule\Core\ModuleConstants;

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