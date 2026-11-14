<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\Graphs;

use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\Graphs\Graphs\GraphArea;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\Graphs\Graphs\GraphBar;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\Graphs\Graphs\GraphBubble;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\Graphs\Graphs\GraphDoughnut;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\Graphs\Graphs\GraphLine;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\Graphs\Graphs\GraphPie;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\Graphs\Graphs\GraphPolarArea;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\Graphs\Graphs\GraphRadar;

class Container extends \ModulesGarden\GGSModule\Components\Container\Container implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new GraphLine());
        $this->addElement(new GraphArea());
        $this->addElement(new GraphBar());
        $this->addElement(new GraphBubble());
        $this->addElement(new GraphPie());
        $this->addElement(new GraphDoughnut());
        $this->addElement(new GraphPolarArea());
        $this->addElement(new GraphRadar());
    }
}
