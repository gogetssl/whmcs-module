<?php

namespace ModulesGarden\GGSModule\App\UI\Admin\Configuration\Pages;

use ModulesGarden\GGSModule\App\UI\Admin\Configuration\Content\Step3;
use ModulesGarden\GGSModule\App\UI\Admin\Configuration\Shared\WizardLayout;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\ClientAreaInterface;
use ModulesGarden\GGSModule\Components\Container\Container;


class ConfigurationStep3 extends Container implements AdminAreaInterface, ClientAreaInterface
{
    public function loadHtml(): void
    {
        $this->addElement((new WizardLayout())->build(3, new Step3()));
    }
}
