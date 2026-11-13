<?php

namespace ModulesGarden\ggsmodule\Core\UI\PageParams;

use ModulesGarden\ggsmodule\Core\Support\Facades\Params;

class ExtraParams
{
    public static function getForCurrentAction():array
    {
        $params = Params::all();

        $moduleAction = ModuleActionsFactory::getFromParams($params);

        return $moduleAction->selectAppropriateParameters($params);
    }
}
