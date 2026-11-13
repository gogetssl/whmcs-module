<?php

namespace ModulesGarden\ggsmodule\Components\Graph;

use ModulesGarden\ggsmodule\Components\Graph\Source\InlineGraph;

class InlineGraphArea extends InlineGraph
{
    public function __construct()
    {
        parent::__construct();

        $this->setType('area');
    }
}