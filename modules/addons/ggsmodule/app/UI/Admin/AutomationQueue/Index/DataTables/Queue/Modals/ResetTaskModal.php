<?php

namespace ModulesGarden\ggsmodule\App\UI\Admin\AutomationQueue\Index\DataTables\Queue\Modals;

use ModulesGarden\ggsmodule\App\UI\Admin\AutomationQueue\Index\DataTables\Queue\Forms\ResetTaskForm;
use ModulesGarden\ggsmodule\Components\Modal\ModalWarning;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AjaxComponentInterface;

class ResetTaskModal extends ModalWarning implements AjaxComponentInterface, AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new ResetTaskForm());
        $this->setTitle($this->translate('title'));
        $this->setContent($this->translate('description'));
    }
}
