<?php

namespace ModulesGarden\GGSModule\App\UI\Admin\Configuration\Pages;

use ModulesGarden\GGSModule\App\UI\Admin\Configuration\Content\Step7;
use ModulesGarden\GGSModule\App\UI\Admin\Configuration\Shared\WizardLayout;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Components\Container\Container;

class ConfigurationStep7 extends Container implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->addElement((new WizardLayout())->build(7, new Step7()));
    }
}
