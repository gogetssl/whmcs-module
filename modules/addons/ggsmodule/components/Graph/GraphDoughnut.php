<?php

namespace ModulesGarden\ggsmodule\Components\Graph;

use ModulesGarden\ggsmodule\Components\Graph\Source\GraphSimpleSeries;

class GraphDoughnut extends GraphSimpleSeries
{
    public function __construct()
    {
        parent::__construct();

        $this->setType('donut');
    }
}