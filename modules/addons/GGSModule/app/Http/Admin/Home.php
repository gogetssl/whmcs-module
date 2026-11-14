<?php

namespace ModulesGarden\GGSModule\App\Http\Admin;

use ModulesGarden\GGSModule\App\UI\Admin\Home\Index\HomeContainer;
use ModulesGarden\GGSModule\Core\Contracts\Controllers\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Http\AbstractController;
use ModulesGarden\GGSModule\Core\Helper;

class Home extends AbstractController implements AdminAreaInterface
{

    public function index()
    {
        return Helper\view()
            ->addElement(HomeContainer::class);
    }
}
