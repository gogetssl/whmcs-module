<?php

namespace ModulesGarden\GGSModule\App\UI\Admin\AutomationQueue\Index\DataTables\Queue\Modals;

use ModulesGarden\GGSModule\App\UI\Admin\AutomationQueue\Index\DataTables\Queue\Forms\ResetTaskForm;
use ModulesGarden\GGSModule\Components\Modal\ModalWarning;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxComponentInterface;

class ResetTaskModal extends ModalWarning implements AjaxComponentInterface, AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new ResetTaskForm());
        $this->setTitle($this->translate('title'));
        $this->setContent($this->translate('description'));
    }
}
