<?php

namespace ModulesGarden\ggsmodule\App\UI\Admin\Configuration\Pages;

use ModulesGarden\ggsmodule\App\UI\Admin\Configuration\Content\Step2;
use ModulesGarden\ggsmodule\App\UI\Admin\Configuration\Shared\WizardLayout;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\ggsmodule\Core\Contracts\Components\ClientAreaInterface;
use ModulesGarden\ggsmodule\Components\Container\Container;


class ConfigurationStep2 extends Container implements AdminAreaInterface, ClientAreaInterface
{
    public function loadHtml(): void
    {
        $this->addElement((new WizardLayout())->build(2, new Step2()));
    }
}
