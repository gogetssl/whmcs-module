<?php

namespace ModulesGarden\GGSModule\App\UI\Admin\Statistics\Index\Widgets;

use ModulesGarden\GGSModule\App\UI\Admin\Statistics\Index\Graphs\ProductIncomeGraph;
use ModulesGarden\GGSModule\Components\Widget\Widget;


class ProductIncomeWidget extends Widget
{
    public function loadHtml(): void
    {
        $this->setTitle($this->translate('title'));
        $this->setIcon('chart-bar');
        $graph = new ProductIncomeGraph();
        $this->addElement($graph);
    }
}