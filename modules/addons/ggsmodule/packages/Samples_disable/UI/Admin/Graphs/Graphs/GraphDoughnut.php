<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\Graphs\Graphs;

use ModulesGarden\ggsmodule\Components\Graph\Series\SimpleSeries;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;

class GraphDoughnut extends \ModulesGarden\ggsmodule\Components\Graph\GraphDoughnut implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        parent::loadHtml();
        $this->setTitle('Graph Doughnut');
    }

    public function loadData(): void
    {
        $this->setLabels(['day 1', 'day 2', 'day 3']);

        for ($i = 1 ; $i <= 3 ; $i++)
        {
            $this->addSeries(new SimpleSeries(rand(0, 10)));
        }
    }
}
