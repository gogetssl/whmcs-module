<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\Graphs\Graphs;

use ModulesGarden\ggsmodule\Components\Graph\Models\DataSet;
use ModulesGarden\ggsmodule\Components\Graph\Series\ExtendedSeries;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;

class GraphArea extends \ModulesGarden\ggsmodule\Components\Graph\GraphArea implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        parent::loadHtml();

        $this->setTitle("Graph Area");
    }

    public function loadData(): void
    {
        $this->setLabels(['day 1', 'day 2', 'day 3']);

        for ($i = 1 ; $i <= 3 ; $i++)
        {
            $this->addSeries(new ExtendedSeries('Data Set ' . $i, [rand(0, 10), rand(0, 10), rand(0, 10)]));
        }
    }
}
