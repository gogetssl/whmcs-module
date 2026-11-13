<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\Home\Tabs\Tabs;

use ModulesGarden\ggsmodule\Core\Contracts\Components\AjaxOnLoadInterface;
use ModulesGarden\ggsmodule\Core\Support\Facades\Request;


class Tab extends \ModulesGarden\ggsmodule\Components\Tab\Tab implements \ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface, AjaxOnLoadInterface
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
