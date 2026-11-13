<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\CollapsableBox\Widgets;

use ModulesGarden\ggsmodule\Components\Widget\Widget;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\CollapsableBox\Forms\CollapsableDropdownForm;

class CollapseDropdownWidget extends Widget implements AjaxComponentInterface, AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->setTitle("Collapse Example");

        $this->addElement(new CollapsableDropdownForm());
    }
}