<?php

namespace ModulesGarden\ggsmodule\Packages\Logs\UI\Modals;

use ModulesGarden\ggsmodule\Components\Modal\ModalBase;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\ggsmodule\Packages\Logs\UI\Forms\ShowDataForm;

class ShowDataModal extends ModalBase implements AjaxComponentInterface, AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new ShowDataForm());
        $this->setTitle($this->translate('title'));
    }
}
