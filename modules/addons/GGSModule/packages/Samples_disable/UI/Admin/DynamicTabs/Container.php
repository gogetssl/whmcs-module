<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\DynamicTabs;

use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\DynamicTabs\Pages\DynamicTabs;

class Container extends \ModulesGarden\GGSModule\Components\Container\Container implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new DynamicTabs());
    }
}