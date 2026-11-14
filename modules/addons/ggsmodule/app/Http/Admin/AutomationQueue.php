<?php

namespace ModulesGarden\GGSModule\App\Http\Admin;

use ModulesGarden\GGSModule\App\UI\Admin\AutomationQueue\Index\AutomationQueueContainer;
use ModulesGarden\GGSModule\Core\Contracts\Controllers\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Http\AbstractController;
use ModulesGarden\GGSModule\Core\Helper;

class AutomationQueue extends AbstractController implements AdminAreaInterface
{

    public function index()
    {
        return Helper\view()
            ->addElement(AutomationQueueContainer::class);
    }
}
