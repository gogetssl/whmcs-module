<?php

namespace ModulesGarden\GGSModule\Fragments\ConfigurableHintBox\UI\Buttons;

use ModulesGarden\GGSModule\Components\DropdownMenuItem\DropdownMenuItem;
use ModulesGarden\GGSModule\Core\Components\Action;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Fragments\ConfigurableHintBox\UI\Modals\EditConfigurationModal;

class EditConfiguration extends DropdownMenuItem implements AdminAreaInterface
{
    protected string $widgetId;

    public function __construct(string $widgetId)
    {
        parent::__construct();

        $this->widgetId = $widgetId;
    }

    public function loadHtml(): void
    {
        $this->setIcon('cog');
        $this->onClick(Action::modalLoad(new EditConfigurationModal())->withParams(["widgetId" => $this->widgetId ]));
    }
}