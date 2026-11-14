<?php

namespace ModulesGarden\GGSModule\App\UI\Admin\Statistics\Index\Widgets;

use ModulesGarden\GGSModule\App\UI\Admin\Statistics\Index\Graphs\RevenueByProviderGraph;
use ModulesGarden\GGSModule\Components\Widget\Widget;


class RevenueByProviderWidget extends Widget
{
    public function loadHtml(): void
    {
        $this->setTitle($this->translate('title'));
        $this->setIcon('trending-up');
        $this->addElement(new RevenueByProviderGraph());
    }
}
