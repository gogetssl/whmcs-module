<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\BasicElements\Modals;

use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;

class Modals extends \ModulesGarden\GGSModule\Components\Container\Container implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new SuccessModals());
        $this->addElement(new DangerModals());
        $this->addElement(new EditModals());
        $this->addElement(new InfoModals());
    }


}
