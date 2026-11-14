<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\CollapsableBox\Widgets;

use ModulesGarden\GGSModule\Components\Switcher\Switcher;
use ModulesGarden\GGSModule\Components\Widget\Widget;
use ModulesGarden\GGSModule\Core\Components\Actions\Collapse;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\CollapsableBox\Forms\CollapsableForm;

class BaseWidget extends Widget implements AjaxComponentInterface, AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->setTitle("Collapse Example");
        
        $this->addElement(new CollapsableForm());
    }
}