<?php

namespace ModulesGarden\ggsmodule\App\UI\Admin\Reports\Index\DataTables\Renewal\Widgets;

use ModulesGarden\ggsmodule\App\UI\Admin\Reports\Index\DataTables\Renewal\Forms\FilterForm;
use ModulesGarden\ggsmodule\Components\Grid\Grid;
use ModulesGarden\ggsmodule\Components\Widget\Widget;

class FilterWidget extends Widget
{
    public function loadHtml(): void
    {
        $grid = new Grid();
        $grid->setRows(
            [
                [
                    [new FilterForm(), 6]
                ]
            ]
        );

        $this->addElement($grid);
    }
}