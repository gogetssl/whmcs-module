<?php

namespace ModulesGarden\GGSModule\Packages\Logs\UI\Buttons;

use ModulesGarden\GGSModule\Components\DropdownMenuItem\DropdownMenuItem;
use ModulesGarden\GGSModule\Core\Components\Action;
use ModulesGarden\GGSModule\Packages\Logs\UI\Modals\EditConfigurationModal;

class EditConfiguration extends DropdownMenuItem
{
    public function loadHtml(): void
    {
        $this->setIcon('cog');
        $this->onClick(Action::modalLoad(new EditConfigurationModal()));
    }
}
