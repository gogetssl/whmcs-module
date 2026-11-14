<?php

namespace ModulesGarden\GGSModule\Packages\Logs\UI\Buttons;

use ModulesGarden\GGSModule\Components\IconButton\IconButtonEdit;
use ModulesGarden\GGSModule\Core\Components\Action;
use ModulesGarden\GGSModule\Packages\Logs\UI\Modals\ShowDataModal;

class ShowDataButton extends IconButtonEdit
{
    public function loadHtml(): void
    {
        $this->setIcon('info');
        $this->onClick(Action::modalLoad(new ShowDataModal()));
    }
}
