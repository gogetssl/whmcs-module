<?php

namespace ModulesGarden\GGSModule\Packages\Logs\UI\Modals;

use ModulesGarden\GGSModule\Components\Modal;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\GGSModule\Packages\Logs\UI\Forms\DeleteLogForm;

class DeleteLogModal extends Modal\ModalDanger implements AjaxComponentInterface, AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new DeleteLogForm());
        $this->setTitle($this->translate('title'));
        $this->setContent($this->translate('description'));
    }
}
