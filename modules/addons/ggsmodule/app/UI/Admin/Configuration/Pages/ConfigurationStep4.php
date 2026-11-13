<?php

namespace ModulesGarden\ggsmodule\App\UI\Admin\Configuration\Pages;

use ModulesGarden\ggsmodule\App\UI\Admin\Configuration\Content\Step4;
use ModulesGarden\ggsmodule\App\UI\Admin\Configuration\Shared\WizardLayout;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\ggsmodule\Core\Contracts\Components\ClientAreaInterface;
use ModulesGarden\ggsmodule\Components\Container\Container;


class ConfigurationStep4 extends Container implements AdminAreaInterface, ClientAreaInterface
{
    public function loadHtml(): void
    {
        $this->addElement((new WizardLayout())->build(4, new Step4()));
    }
}
