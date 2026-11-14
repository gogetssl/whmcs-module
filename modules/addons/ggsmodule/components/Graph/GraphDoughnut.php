<?php

namespace ModulesGarden\GGSModule\Components\Graph;

use ModulesGarden\GGSModule\Components\Graph\Source\GraphSimpleSeries;

class GraphDoughnut extends GraphSimpleSeries
{
    public function __construct()
    {
        parent::__construct();

        $this->setType('donut');
    }
}