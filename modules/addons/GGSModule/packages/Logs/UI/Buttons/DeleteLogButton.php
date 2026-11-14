<?php

namespace ModulesGarden\GGSModule\Packages\Logs\UI\Buttons;

use ModulesGarden\GGSModule\Components\IconButton;
use ModulesGarden\GGSModule\Core\Components\Action;
use ModulesGarden\GGSModule\Packages\Logs\UI\Modals\DeleteLogModal;

class DeleteLogButton extends IconButton\IconButtonDelete
{
    public function loadHtml(): void
    {
        parent::loadHtml();

        $this->onClick(Action::modalOpen(new DeleteLogModal()));
    }
}
