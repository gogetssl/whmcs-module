<?php

namespace ModulesGarden\ggsmodule\Packages\Logs\UI\Modals;

use ModulesGarden\ggsmodule\Components\Modal\ModalEdit;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\ggsmodule\Packages\Logs\UI\Forms\ExportCsvForm;

class ExportCsvModal extends ModalEdit implements AjaxComponentInterface, AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new ExportCsvForm());
        $this->setTitle($this->translate('title'));
    }
}