<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\DataTable;

use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;

class Container extends \ModulesGarden\ggsmodule\Components\Container\Container implements AdminAreaInterface
{
    public function loadHtml(): void
    {
//        $this->addElement(new \ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\DataTable\QueryDataProvider\DataTable());
//        $this->addElement(new \ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\DataTable\ArrayDataProvider\DataTable());
//        $this->addElement(new \ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\DataTable\Tabs\TabsWidget());
        $this->addElement(new StaticAjaxData\Container());
    }
}