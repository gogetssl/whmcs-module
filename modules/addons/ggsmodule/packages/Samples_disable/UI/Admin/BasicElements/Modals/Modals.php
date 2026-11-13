<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\BasicElements\Modals;

use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;

class Modals extends \ModulesGarden\ggsmodule\Components\Container\Container implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new SuccessModals());
        $this->addElement(new DangerModals());
        $this->addElement(new EditModals());
        $this->addElement(new InfoModals());
    }


}
