<?php

namespace ModulesGarden\ggsmodule\Packages\Product\UI\Buttons;

use ModulesGarden\ggsmodule\Components\Button\ButtonInfo;
use ModulesGarden\ggsmodule\Core\Components\Actions\ModalLoad;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\ggsmodule\Packages\Product\UI\Modals;

class ServerConfiguration extends ButtonInfo implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->setTitle($this->translate('button.title'));
        $this->setIcon('settings');
        $this->onClick((new ModalLoad(new Modals\ServerConfiguration())));
    }
}