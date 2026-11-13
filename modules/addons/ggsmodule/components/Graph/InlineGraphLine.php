<?php

namespace ModulesGarden\ggsmodule\Components\Graph;

use ModulesGarden\ggsmodule\Components\Graph\Source\InlineGraph;

class InlineGraphLine extends InlineGraph
{
    public function __construct()
    {
        parent::__construct();

        $this->setType('line');
    }
}