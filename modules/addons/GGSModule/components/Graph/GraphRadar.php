<?php

namespace ModulesGarden\GGSModule\Components\Graph;

use ModulesGarden\GGSModule\Components\Graph\Source\GraphExtendedSeries;

class GraphRadar extends GraphExtendedSeries
{
    public function __construct()
    {
        parent::__construct();

        $this->setType('radar');
    }
}
