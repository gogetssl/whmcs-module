<?php

namespace ModulesGarden\GGSModule\Packages\Logs\UI\Buttons;

use ModulesGarden\GGSModule\Components\Button\ButtonDanger;
use ModulesGarden\GGSModule\Core\Components\Action;
use ModulesGarden\GGSModule\Packages\Logs\UI\Modals\CleanLogModal;

class CleanLogButton extends ButtonDanger
{
    public function loadHtml(): void
    {
        parent::loadHtml();

        $this->setIcon('delete');
        $this->setTitle($this->translate('title'));
        $this->onClick(Action::modalOpen(new CleanLogModal()));
    }
}
