<?php

namespace ModulesGarden\ggsmodule\Core\Support\Facades;

class Store extends AbstractFacade
{
    protected static function getFacadeAccessor(): string
    {
        return \ModulesGarden\ggsmodule\Core\Services\Store::class;
    }
}