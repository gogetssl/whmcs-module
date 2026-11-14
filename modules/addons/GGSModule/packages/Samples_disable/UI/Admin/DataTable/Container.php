<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\DataTable;

use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;

class Container extends \ModulesGarden\GGSModule\Components\Container\Container implements AdminAreaInterface
{
    public function loadHtml(): void
    {
//        $this->addElement(new \ModulesGarden\GGSModule\Packages\Samples\UI\Admin\DataTable\QueryDataProvider\DataTable());
//        $this->addElement(new \ModulesGarden\GGSModule\Packages\Samples\UI\Admin\DataTable\ArrayDataProvider\DataTable());
//        $this->addElement(new \ModulesGarden\GGSModule\Packages\Samples\UI\Admin\DataTable\Tabs\TabsWidget());
        $this->addElement(new StaticAjaxData\Container());
    }
}