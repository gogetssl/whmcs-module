<?php

namespace ModulesGarden\ggsmodule\Core\Http\View\MenuProviders;

use ModulesGarden\ggsmodule\Core\FileReader\Reader;
use ModulesGarden\ggsmodule\Core\Helper;
use ModulesGarden\ggsmodule\Core\ModuleConstants;

class MenuProviderConfig implements MenuProviderInterface
{
    public function getMenuItems(): array
    {
        $isAdmin = Helper\isAdmin();
        $file    = ($isAdmin) ? 'admin.yml' : 'client.yml';

        $menu = Reader::read(ModuleConstants::getDevConfigDir() . DIRECTORY_SEPARATOR . 'menu' . DIRECTORY_SEPARATOR . $file)->get();

        array_walk($menu, function(&$value) {
            $value = $value ?: [];
        });

        return $menu;
    }
}
