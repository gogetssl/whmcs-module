<?php

namespace ModulesGarden\GGSModule\Core\Support\Facades;

class Store extends AbstractFacade
{
    protected static function getFacadeAccessor(): string
    {
        return \ModulesGarden\GGSModule\Core\Services\Store::class;
    }
}