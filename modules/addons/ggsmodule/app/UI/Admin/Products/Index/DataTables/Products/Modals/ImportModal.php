<?php

namespace ModulesGarden\GGSModule\App\UI\Admin\Products\Index\DataTables\Products\Modals;

use ModulesGarden\GGSModule\App\UI\Admin\Products\Index\DataTables\Products\Forms\ImportForm;
use ModulesGarden\GGSModule\Components\Modal\Modal;
use ModulesGarden\GGSModule\Components\Modal\ModalEdit;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxComponentInterface;

class ImportModal extends ModalEdit implements AdminAreaInterface, AjaxComponentInterface
{
    public function loadHtml(): void
    {
        $this->setSize(Modal::SIZE_EXTRA_LARGE);
        $this->addElement(new ImportForm());
    }
}