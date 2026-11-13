<?php

namespace ModulesGarden\ggsmodule\Fragments\ConfigurableHintBox\UI\Widgets;

use ModulesGarden\ggsmodule\Components\DropdownMenu\DropdownMenu;
use ModulesGarden\ggsmodule\Components\HintsBox\HintsBox;
use ModulesGarden\ggsmodule\Core\Components\Traits\ToolbarTrait;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\ggsmodule\Core\Data\Container;
use ModulesGarden\ggsmodule\Core\Support\Facades\Request;
use ModulesGarden\ggsmodule\Fragments\ConfigurableHintBox\UI\Buttons\EditConfiguration;
use ModulesGarden\ggsmodule\Fragments\ConfigurableHintBox\UI\Buttons\ExpandButton;
use ModulesGarden\ggsmodule\Fragments\ConfigurableHintBox\UI\Buttons\HideButton;
use ModulesGarden\ggsmodule\Packages\ModuleSettings\Support\Facades\ModuleSettings;

class ConfigurableHintBox extends HintsBox implements AjaxComponentInterface, AdminAreaInterface
{
    use ToolbarTrait;

    protected bool $hideHintBox = false;
    protected bool $expandHintBox = false;

    public function preLoadHtml(): void
    {
        $burger = new DropdownMenu();
        $burger->addItem(new EditConfiguration($this->getId()));

        $this->hideHintBox = ModuleSettings::get('hideHintBox-' . $this->getId(), false);
        $this->expandHintBox = (new Container(Request::get('ajaxData', [])))->get('expand', false);

        if ($this->hideHintBox)
        {
            $button = ($this->hideHintBox && $this->expandHintBox) ?
                new HideButton($this->getId()) :
                new ExpandButton($this->getId());

            $this->addToToolbar($button);
        }

        $this->addToToolbar($burger);
    }

    public function postLoadHtml(): void
    {
        if ($this->hideHintBox && !$this->expandHintBox)
        {
            $this->setSlot('elements.hints', []);
        }
    }
}