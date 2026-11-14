<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\Graphs\Graphs;

use ModulesGarden\GGSModule\Components\Graph\Series\ExtendedSeries;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;

class GraphBubble extends \ModulesGarden\GGSModule\Components\Graph\GraphBubble implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        parent::loadHtml();
        $this->setTitle('Graph Bubble');
    }

    public function loadData(): void
    {
        $labels = ['day 1', 'day 2', 'day 3', 'day 4', 'day 5', 'day 6', 'day 7', 'day 8'];
        $this->setLabels($labels);

        $this->addSeries(new ExtendedSeries('Data Set 1', [[1,1,4], [6,5,1], [8,2,3]]));
        $this->addSeries(new ExtendedSeries('Data Set 2', [[2,2,5], [5,7,2], [6,4,4]]));
    }
}
