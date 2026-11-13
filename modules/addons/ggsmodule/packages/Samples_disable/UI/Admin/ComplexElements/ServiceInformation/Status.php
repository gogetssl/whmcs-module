<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\ComplexElements\ServiceInformation;

use ModulesGarden\ggsmodule\Components\Label\Label;
use ModulesGarden\ggsmodule\Core\Components\Enums\Color;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AjaxAutoReloadInterface;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AjaxOnLoadInterface;
use ModulesGarden\ggsmodule\Core\Contracts\Components\ClientAreaInterface;
use ModulesGarden\ggsmodule\Core\UI\Interfaces\ClientArea;

class Status extends Label implements AjaxOnLoadInterface, AjaxAutoReloadInterface, AdminAreaInterface, ClientAreaInterface
{
    public function loadData(): void
    {
        $types = [
            Color::DANGER,
            Color::INFO,
            Color::SUCCESS,
            Color::WARNING,
        ];

        $type = $types[rand(0, 3)];
        $this->setType($type);
        $this->setText($type);
        $this->displayAsStatusLabel(rand(0, 1));
    }

    public function loadHtml(): void
    {
        $this->setText('Loading...');
    }
}
