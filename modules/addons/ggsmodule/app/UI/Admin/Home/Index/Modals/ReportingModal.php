<?php

namespace ModulesGarden\GGSModule\App\UI\Admin\Home\Index\Modals;

use ModulesGarden\GGSModule\App\UI\Admin\Home\Index\Forms\ReportingForm;
use ModulesGarden\GGSModule\Components\Modal\Modal;
use ModulesGarden\GGSModule\Components\Modal\ModalEdit;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxComponentInterface;

class ReportingModal extends Modal implements AdminAreaInterface, AjaxComponentInterface
{
    public function loadHtml(): void
    {
        $this->setTitle($this->translate('sendReport'));
        $this->addElement(new ReportingForm());
    }
}