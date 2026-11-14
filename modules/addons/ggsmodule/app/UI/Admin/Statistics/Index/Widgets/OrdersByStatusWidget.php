<?php

namespace ModulesGarden\GGSModule\App\UI\Admin\Statistics\Index\Widgets;

use ModulesGarden\GGSModule\App\UI\Admin\Statistics\Index\Graphs\OrdersByStatusGraph;
use ModulesGarden\GGSModule\Components\Widget\Widget;


class OrdersByStatusWidget extends Widget
{
    public function loadHtml(): void
    {
        $this->setTitle($this->translate('title'));
        $this->setIcon('chart-bar');
        $this->addElement(new OrdersByStatusGraph());
    }
}
