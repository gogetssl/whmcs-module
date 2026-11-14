<?php

namespace ModulesGarden\GGSModule\Packages\Logs\UI\Buttons;

use ModulesGarden\GGSModule\Components\IconButton\IconButtonDelete;
use ModulesGarden\GGSModule\Core\Components\Action;
use ModulesGarden\GGSModule\Packages\Logs\UI\Modals\MassDeleteModal;

class MassDeleteButton extends IconButtonDelete
{
    public function loadHtml(): void
    {
        parent::loadHtml();

        $this->displayWithTitle($this->translate('DeleteMass'));
        $this->onClick(Action::modalOpen(new MassDeleteModal()));
    }
}