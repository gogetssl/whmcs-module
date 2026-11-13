<?php

namespace ModulesGarden\ggsmodule\App\UI\Client\Sidebars\Buttons;

use ModulesGarden\ggsmodule\App\UI\Client\Sidebars\Modals\SidebarSampleModal;
use ModulesGarden\ggsmodule\Components\IconButton\IconButton;
use ModulesGarden\ggsmodule\Core\Components\Actions\ModalLoad;

class SidebarSampleButton extends IconButton
{
    public function loadHtml(): void
    {
        $this->onClick(new ModalLoad(new SidebarSampleModal()));
        $this->displayWithTitle("Open Popup");
        $this->setTitle("qwertyuikol");
    }
}