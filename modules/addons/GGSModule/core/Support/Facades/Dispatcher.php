<?php

namespace ModulesGarden\GGSModule\Core\Support\Facades;

class Dispatcher extends AbstractFacade
{
    protected static function getFacadeAccessor(): string
    {
        return \ModulesGarden\GGSModule\Core\Events\Dispatcher::class;
    }
}
