<?php

namespace ModulesGarden\GGSModule\App\UI\Client\Sidebars\Buttons;

use ModulesGarden\GGSModule\App\UI\Client\Sidebars\Modals\SidebarSampleModal;
use ModulesGarden\GGSModule\Components\IconButton\IconButton;
use ModulesGarden\GGSModule\Core\Components\Actions\ModalLoad;

class SidebarSampleButton extends IconButton
{
    public function loadHtml(): void
    {
        $this->onClick(new ModalLoad(new SidebarSampleModal()));
        $this->displayWithTitle("Open Popup");
        $this->setTitle("qwertyuikol");
    }
}