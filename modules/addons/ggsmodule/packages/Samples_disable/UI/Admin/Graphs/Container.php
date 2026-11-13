<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\Graphs;

use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\Graphs\Graphs\GraphArea;
use ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\Graphs\Graphs\GraphBar;
use ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\Graphs\Graphs\GraphBubble;
use ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\Graphs\Graphs\GraphDoughnut;
use ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\Graphs\Graphs\GraphLine;
use ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\Graphs\Graphs\GraphPie;
use ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\Graphs\Graphs\GraphPolarArea;
use ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\Graphs\Graphs\GraphRadar;

class Container extends \ModulesGarden\ggsmodule\Components\Container\Container implements AdminAreaInterface
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
