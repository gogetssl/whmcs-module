<?php

namespace ModulesGarden\GGSModule\Packages\Logs\UI\Modals;

use ModulesGarden\GGSModule\Components\Modal\ModalDanger;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\GGSModule\Packages\Logs\UI\Forms\MenuDeleteForm;

class MenuDeleteModal extends ModalDanger implements AjaxComponentInterface, AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new MenuDeleteForm());
        $this->setTitle($this->translate('title'));
    }
}