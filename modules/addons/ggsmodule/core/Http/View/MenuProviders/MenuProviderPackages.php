<?php

namespace ModulesGarden\ggsmodule\Core\Http\View\MenuProviders;

use ModulesGarden\ggsmodule\Core\DependencyInjection\PackageServices;
use ModulesGarden\ggsmodule\Core\ModuleConstants;
use function ModulesGarden\ggsmodule\Core\make;

class MenuProviderPackages implements MenuProviderInterface
{
    //@todo - this method should be called with user level, this function cannot check if we are in the AA or CA
    public function getMenuItems(): array
    {
        $menu = make(PackageServices::class)->getMenu();
        $type = ModuleConstants::getLevel();

        return $menu[$type] ?? [];
    }
}
