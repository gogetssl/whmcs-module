<?php

namespace ModulesGarden\GGSModule\Core\Http\View\MenuProviders;

use ModulesGarden\GGSModule\Core\FileReader\Reader;
use ModulesGarden\GGSModule\Core\Helper;
use ModulesGarden\GGSModule\Core\ModuleConstants;

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
