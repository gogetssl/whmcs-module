<?php

namespace ModulesGarden\GGSModule\Core\UI\PageParams;

use ModulesGarden\GGSModule\Core\Support\Facades\Params;

class ExtraParams
{
    public static function getForCurrentAction():array
    {
        $params = Params::all();

        $moduleAction = ModuleActionsFactory::getFromParams($params);

        return $moduleAction->selectAppropriateParameters($params);
    }
}
