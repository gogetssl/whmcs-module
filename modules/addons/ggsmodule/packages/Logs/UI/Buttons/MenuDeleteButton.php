<?php

namespace ModulesGarden\ggsmodule\Packages\Logs\UI\Buttons;

use ModulesGarden\ggsmodule\Components\DropdownMenuItem\DropdownMenuItem;
use ModulesGarden\ggsmodule\Core\Components\Action;
use ModulesGarden\ggsmodule\Packages\Logs\UI\Modals\MenuDeleteModal;

class MenuDeleteButton extends DropdownMenuItem
{
    public function loadHtml(): void
    {
        $this->setIcon('delete');
        $this->onClick(Action::modalLoad(new MenuDeleteModal()));
    }
}