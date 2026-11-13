<?php

namespace ModulesGarden\ggsmodule\Packages\Logs\UI\Modals;

use ModulesGarden\ggsmodule\Components\Modal;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\ggsmodule\Packages\Logs\UI\Forms\DeleteLogForm;

class DeleteLogModal extends Modal\ModalDanger implements AjaxComponentInterface, AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new DeleteLogForm());
        $this->setTitle($this->translate('title'));
        $this->setContent($this->translate('description'));
    }
}
