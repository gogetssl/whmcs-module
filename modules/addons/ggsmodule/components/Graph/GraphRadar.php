<?php

namespace ModulesGarden\ggsmodule\Components\Graph;

use ModulesGarden\ggsmodule\Components\Graph\Source\GraphExtendedSeries;

class GraphRadar extends GraphExtendedSeries
{
    public function __construct()
    {
        parent::__construct();

        $this->setType('radar');
    }
}
