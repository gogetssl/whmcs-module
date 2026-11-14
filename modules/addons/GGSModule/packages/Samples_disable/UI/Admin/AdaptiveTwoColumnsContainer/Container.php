<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\AdaptiveTwoColumnsContainer;

use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\BasicElements\LabelsBadgesButtons\Labels;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\ComplexElements\CronTasks\CronTasks;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\ComplexElements\Overview\Overview;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\DataTable\Tabs\TabsWidget;

class Container extends \ModulesGarden\GGSModule\Components\AdaptiveTwoColumnsContainer\AdaptiveTwoColumnsContainer implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new Labels());
        $this->addElement(new TabsWidget());
        $this->addElement(new CronTasks());
        $this->addElement(new Overview());
    }
}