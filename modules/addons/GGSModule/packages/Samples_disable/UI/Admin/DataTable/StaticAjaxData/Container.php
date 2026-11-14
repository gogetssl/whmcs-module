<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\DataTable\StaticAjaxData;

use ModulesGarden\GGSModule\Components\Grid\Grid;

class Container extends \ModulesGarden\GGSModule\Components\Container\Container
{
    public function loadHtml(): void
    {
        $grid = new Grid();
        $grid->setRows([

                [[new DataTable()]],
                [[new Widget()]],
            ]);
        $this->addElement($grid);
    }
}