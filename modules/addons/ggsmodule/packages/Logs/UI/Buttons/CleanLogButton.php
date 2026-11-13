<?php

namespace ModulesGarden\ggsmodule\Packages\Logs\UI\Buttons;

use ModulesGarden\ggsmodule\Components\Button\ButtonDanger;
use ModulesGarden\ggsmodule\Core\Components\Action;
use ModulesGarden\ggsmodule\Packages\Logs\UI\Modals\CleanLogModal;

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
