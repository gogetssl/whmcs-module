<?php

namespace ModulesGarden\GGSModule\Packages\Product\UI\Buttons;

use ModulesGarden\GGSModule\Components\Button\ButtonInfo;
use ModulesGarden\GGSModule\Core\Components\Actions\ModalLoad;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Packages\Product\UI\Modals;

class ServerConfiguration extends ButtonInfo implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->setTitle($this->translate('button.title'));
        $this->setIcon('settings');
        $this->onClick((new ModalLoad(new Modals\ServerConfiguration())));
    }
}