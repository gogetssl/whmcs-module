<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\Home\Tabs\Tabs;

use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxOnLoadInterface;
use ModulesGarden\GGSModule\Core\Support\Facades\Request;


class Tab extends \ModulesGarden\GGSModule\Components\Tab\Tab implements \ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface, AjaxOnLoadInterface
{
    public function loadData(): void
    {
        $this->setContent('load data! <pre>' . print_r((Request::getFacadeRoot())->getAll(), true));
    }

    public function loadHtml(): void
    {
        $this->setTitle(rand(0, 100));
        $this->setContent('load html!');
    }
}
