<?php

namespace ModulesGarden\GGSModule\Components\Graph;

use ModulesGarden\GGSModule\Components\Graph\Source\SparklineGraph;

class SparklineGraphLine extends SparklineGraph
{
    public function __construct()
    {
        parent::__construct();

        $this->setSlot("line");
    }
}