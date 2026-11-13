<?php

namespace ModulesGarden\ggsmodule\App\Http\Admin;

use ModulesGarden\ggsmodule\App\UI\Admin\Import\Index\ImportContainer;
use ModulesGarden\ggsmodule\Core\Contracts\Controllers\AdminAreaInterface;
use ModulesGarden\ggsmodule\Core\Http\AbstractController;
use ModulesGarden\ggsmodule\Core\Helper;

class Import extends AbstractController implements AdminAreaInterface
{

    public function index()
    {
        return Helper\view()
            ->addElement(ImportContainer::class);
    }
}
