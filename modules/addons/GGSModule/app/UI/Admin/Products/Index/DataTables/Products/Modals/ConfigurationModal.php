<?php

namespace ModulesGarden\GGSModule\App\UI\Admin\Products\Index\DataTables\Products\Modals;


use ModulesGarden\GGSModule\App\UI\Admin\Products\Index\DataTables\Products\Forms\ConfigurationForm;
use ModulesGarden\GGSModule\Components\Modal\ModalEdit;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxComponentInterface;

class ConfigurationModal extends ModalEdit implements AdminAreaInterface, AjaxComponentInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new ConfigurationForm());
    }
}
