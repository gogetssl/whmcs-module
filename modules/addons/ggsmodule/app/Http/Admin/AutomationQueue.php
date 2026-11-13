<?php

namespace ModulesGarden\ggsmodule\App\Http\Admin;

use ModulesGarden\ggsmodule\App\UI\Admin\AutomationQueue\Index\AutomationQueueContainer;
use ModulesGarden\ggsmodule\Core\Contracts\Controllers\AdminAreaInterface;
use ModulesGarden\ggsmodule\Core\Http\AbstractController;
use ModulesGarden\ggsmodule\Core\Helper;

class AutomationQueue extends AbstractController implements AdminAreaInterface
{

    public function index()
    {
        return Helper\view()
            ->addElement(AutomationQueueContainer::class);
    }
}
