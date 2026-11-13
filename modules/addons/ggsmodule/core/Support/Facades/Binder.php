<?php

namespace ModulesGarden\ggsmodule\Core\Support\Facades;

/**
 * @method static call(object $obj, string $name)
 */
class Binder extends AbstractFacade
{
    protected static function getFacadeAccessor(): string
    {
        return \ModulesGarden\ggsmodule\Core\Services\Binder::class;
    }
}
