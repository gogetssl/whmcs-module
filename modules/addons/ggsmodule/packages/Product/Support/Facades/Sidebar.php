<?php

namespace ModulesGarden\ggsmodule\Packages\Product\Support\Facades;

use ModulesGarden\ggsmodule\Core\Support\Facades\AbstractFacade;
use ModulesGarden\ggsmodule\Packages\Product\Services\Sidebar as SidebarService;

/**
 * @method static getByName(string $item)
 * @method static array getAll()
 */
class Sidebar extends AbstractFacade
{
    protected static function getFacadeAccessor(): string
    {
        return SidebarService::class;
    }
}