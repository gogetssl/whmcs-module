<?php

namespace ModulesGarden\ggsmodule\Packages\Logs\UI\Buttons;

use ModulesGarden\ggsmodule\Components\IconButton\IconButtonEdit;
use ModulesGarden\ggsmodule\Core\Components\Action;
use ModulesGarden\ggsmodule\Packages\Logs\UI\Modals\ShowDataModal;

class ShowDataButton extends IconButtonEdit
{
    public function loadHtml(): void
    {
        $this->setIcon('info');
        $this->onClick(Action::modalLoad(new ShowDataModal()));
    }
}
