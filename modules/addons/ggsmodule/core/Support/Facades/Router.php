<?php

namespace ModulesGarden\ggsmodule\Core\Support\Facades;


/**
 * @method static getCurrentRoute : \ModulesGarden\ggsmodule\Core\Routing\Route
 */
class Router extends AbstractFacade
{
    protected static function getFacadeAccessor(): string
    {
        return \ModulesGarden\ggsmodule\Core\Services\Router::class;
    }
}
