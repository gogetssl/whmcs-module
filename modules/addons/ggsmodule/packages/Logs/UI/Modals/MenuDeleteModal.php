<?php

namespace ModulesGarden\ggsmodule\Packages\Logs\UI\Modals;

use ModulesGarden\ggsmodule\Components\Modal\ModalDanger;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\ggsmodule\Packages\Logs\UI\Forms\MenuDeleteForm;

class MenuDeleteModal extends ModalDanger implements AjaxComponentInterface, AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new MenuDeleteForm());
        $this->setTitle($this->translate('title'));
    }
}