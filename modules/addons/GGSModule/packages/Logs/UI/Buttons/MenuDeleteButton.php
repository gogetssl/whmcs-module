<?php

namespace ModulesGarden\GGSModule\Packages\Logs\UI\Buttons;

use ModulesGarden\GGSModule\Components\DropdownMenuItem\DropdownMenuItem;
use ModulesGarden\GGSModule\Core\Components\Action;
use ModulesGarden\GGSModule\Packages\Logs\UI\Modals\MenuDeleteModal;

class MenuDeleteButton extends DropdownMenuItem
{
    public function loadHtml(): void
    {
        $this->setIcon('delete');
        $this->onClick(Action::modalLoad(new MenuDeleteModal()));
    }
}