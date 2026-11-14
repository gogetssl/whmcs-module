<?php

namespace ModulesGarden\GGSModule\App\Http\Admin;

use ModulesGarden\GGSModule\App\UI\Admin\Statistics\Index\StatisticsContainer;
use ModulesGarden\GGSModule\Core\Contracts\Controllers\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Http\AbstractController;
use ModulesGarden\GGSModule\Core\Helper;
use function ModulesGarden\GGSModule\Core\Helper;

class Statistics extends AbstractController implements AdminAreaInterface
{

    public function index()
    {
        return Helper\view()
            ->addElement(StatisticsContainer::class);
    }
}
