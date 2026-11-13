<?php

namespace ModulesGarden\ggsmodule\Core\Support\Facades;

class Dispatcher extends AbstractFacade
{
    protected static function getFacadeAccessor(): string
    {
        return \ModulesGarden\ggsmodule\Core\Events\Dispatcher::class;
    }
}
