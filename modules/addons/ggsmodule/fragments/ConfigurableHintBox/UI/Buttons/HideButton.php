<?php

namespace ModulesGarden\ggsmodule\Fragments\ConfigurableHintBox\UI\Buttons;

use ModulesGarden\ggsmodule\Core\Components\Actions\ReloadById;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;

class HideButton extends ExpandButton implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->setIcon('chevron-up');
        $this->onClick((new ReloadById($this->widgetId))->withParams(["expand" => 0]));
    }
}