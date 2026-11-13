<?php

namespace ModulesGarden\ggsmodule\Components\Graph;

use ModulesGarden\ggsmodule\Components\Graph\Source\SparklineGraph;

class SparklineGraphArea extends SparklineGraph
{
    public function __construct()
    {
        parent::__construct();

        $this->setType("area");
    }
}