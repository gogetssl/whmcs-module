<?php

namespace ModulesGarden\GGSModule\App\UI\Admin\Reports\Index\DataTables\ProfitLoss\Widgets;

use ModulesGarden\GGSModule\App\UI\Admin\Reports\Index\DataTables\ProfitLoss\Forms\FilterForm;
use ModulesGarden\GGSModule\Components\Grid\Grid;
use ModulesGarden\GGSModule\Components\Widget\Widget;

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