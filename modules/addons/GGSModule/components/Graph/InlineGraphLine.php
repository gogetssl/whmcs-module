<?php

namespace ModulesGarden\GGSModule\Components\Graph;

use ModulesGarden\GGSModule\Components\Graph\Source\InlineGraph;

class InlineGraphLine extends InlineGraph
{
    public function __construct()
    {
        parent::__construct();

        $this->setType('line');
    }
}