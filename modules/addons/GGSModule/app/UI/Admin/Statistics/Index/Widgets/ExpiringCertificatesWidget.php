<?php

namespace ModulesGarden\GGSModule\App\UI\Admin\Statistics\Index\Widgets;

use ModulesGarden\GGSModule\App\UI\Admin\Statistics\Index\Graphs\ExpiringCertificatesGraph;
use ModulesGarden\GGSModule\Components\Widget\Widget;


class ExpiringCertificatesWidget extends Widget
{
    public function loadHtml(): void
    {
        $this->setTitle($this->translate('title'));
        $this->setIcon('calendar-month-outline');
        $this->addElement(new ExpiringCertificatesGraph());
    }
}
