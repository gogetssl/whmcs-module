<?php

namespace ModulesGarden\GGSModule\Core\Support\Facades;


/**
 * @method static getCurrentRoute : \ModulesGarden\GGSModule\Core\Routing\Route
 */
class Router extends AbstractFacade
{
    protected static function getFacadeAccessor(): string
    {
        return \ModulesGarden\GGSModule\Core\Services\Router::class;
    }
}
