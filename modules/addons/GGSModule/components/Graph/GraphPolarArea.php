<?php

namespace ModulesGarden\GGSModule\Components\Graph;

use ModulesGarden\GGSModule\Components\Graph\Source\GraphSimpleSeries;

class GraphPolarArea extends GraphSimpleSeries
{
    public function __construct()
    {
        parent::__construct();

        $this->setType('polarArea');
    }
}
