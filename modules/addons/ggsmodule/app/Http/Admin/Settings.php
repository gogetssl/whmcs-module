<?php

namespace ModulesGarden\ggsmodule\App\Http\Admin;

use ModulesGarden\ggsmodule\App\UI\Admin\Home\Index\HomeContainer;
use ModulesGarden\ggsmodule\App\UI\Admin\Settings\Index\SettingsContainer;
use ModulesGarden\ggsmodule\Core\Contracts\Controllers\AdminAreaInterface;
use ModulesGarden\ggsmodule\Core\Http\AbstractController;
use ModulesGarden\ggsmodule\Core\Helper;

class Settings extends AbstractController implements AdminAreaInterface
{

    public function index()
    {
        return Helper\view()
            ->addElement(SettingsContainer::class);
    }
}
