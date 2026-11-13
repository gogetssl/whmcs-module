<?php

namespace ModulesGarden\ggsmodule\App\UI\Admin\Home\Index\Modals;

use ModulesGarden\ggsmodule\App\UI\Admin\Home\Index\Forms\ReportingForm;
use ModulesGarden\ggsmodule\Components\Modal\Modal;
use ModulesGarden\ggsmodule\Components\Modal\ModalEdit;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AjaxComponentInterface;

class ReportingModal extends Modal implements AdminAreaInterface, AjaxComponentInterface
{
    public function loadHtml(): void
    {
        $this->setTitle($this->translate('sendReport'));
        $this->addElement(new ReportingForm());
    }
}