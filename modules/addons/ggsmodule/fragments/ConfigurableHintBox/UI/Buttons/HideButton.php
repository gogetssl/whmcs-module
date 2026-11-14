<?php

namespace ModulesGarden\GGSModule\Fragments\ConfigurableHintBox\UI\Buttons;

use ModulesGarden\GGSModule\Core\Components\Actions\ReloadById;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;

class HideButton extends ExpandButton implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->setIcon('chevron-up');
        $this->onClick((new ReloadById($this->widgetId))->withParams(["expand" => 0]));
    }
}