<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\ComplexElements\Labels;

use ModulesGarden\GGSModule\Components\Label\Label;
use ModulesGarden\GGSModule\Core\Components\Enums\Color;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxAutoReloadInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxOnLoadInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\ClientAreaInterface;
use ModulesGarden\GGSModule\Core\UI\Interfaces\ClientArea;

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
