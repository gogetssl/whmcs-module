<?php

namespace ModulesGarden\GGSModule\Packages\Product\Support\Facades;

use ModulesGarden\GGSModule\Core\Support\Facades\AbstractFacade;
use ModulesGarden\GGSModule\Packages\Product\Services\Sidebar as SidebarService;

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