<?php

namespace ModulesGarden\GGSModule\App\UI\Admin\Products\Index\DataTables\Products\Modals;

use ModulesGarden\GGSModule\App\UI\Admin\Products\Index\DataTables\Products\Forms\ImportForm;
use ModulesGarden\GGSModule\App\UI\Admin\Products\Index\DataTables\Products\Forms\ReSyncForm;
use ModulesGarden\GGSModule\Components\Modal\Modal;
use ModulesGarden\GGSModule\Components\Modal\ModalEdit;
use ModulesGarden\GGSModule\Components\Text\Text;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxComponentInterface;

class ReSyncModal extends ModalEdit implements AdminAreaInterface, AjaxComponentInterface
{
    public function loadHtml(): void
    {
        $this->setTitle($this->translate('reSync'));
        //$this->setSize(Modal::SIZE_EXTRA_LARGE);
        $this->addElement(new ReSyncForm());
        $this->addElement((new Text())->setText($this->translate('description')));
    }
}