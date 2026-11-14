<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\CollapsableBox;

use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\CollapsableBox\Widgets\AccordionWidget;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\CollapsableBox\Widgets\BaseWidget;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\CollapsableBox\Widgets\CollapseDropdownWidget;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\CollapsableBox\Widgets\CollapseGroupWidget;

class Container extends \ModulesGarden\GGSModule\Components\Container\Container implements AdminAreaInterface, AjaxComponentInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new CollapseDropdownWidget());
        $this->addElement(new BaseWidget());
        $this->addElement(new AccordionWidget());
        $this->addElement(new CollapseGroupWidget());
    }
}