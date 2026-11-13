<?php

namespace ModulesGarden\ggsmodule\Fragments\ConfigurableHintBox\UI\Buttons;

use ModulesGarden\ggsmodule\Components\IconButton\IconButton;
use ModulesGarden\ggsmodule\Core\Components\Actions\ReloadById;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;

class ExpandButton extends IconButton implements AdminAreaInterface
{
    protected string $widgetId;

    public function __construct(string $widgetId)
    {
        parent::__construct();

        $this->widgetId = $widgetId;
    }

    public function loadHtml(): void
    {
        $this->setIcon('chevron-down');
        $this->onClick((new ReloadById($this->widgetId))->withParams(["expand" => 1]));
    }
}