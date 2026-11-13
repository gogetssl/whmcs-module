<?php

namespace ModulesGarden\ggsmodule\Core\Support\Facades;

/**
 *  @method static getByName(string $item)
 *  @method static array getAll()
 */
class Sidebar extends AbstractFacade
{
    protected static function getFacadeAccessor(): string
    {
        return \ModulesGarden\ggsmodule\Core\Services\Sidebar::class;
    }
}