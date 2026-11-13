<?php

namespace ModulesGarden\ggsmodule\App\UI\Admin\Products\Index\DataTables\Products\Modals;

use ModulesGarden\ggsmodule\App\UI\Admin\Products\Index\DataTables\Products\Forms\ImportForm;
use ModulesGarden\ggsmodule\App\UI\Admin\Products\Index\DataTables\Products\Forms\ReSyncForm;
use ModulesGarden\ggsmodule\Components\Modal\Modal;
use ModulesGarden\ggsmodule\Components\Modal\ModalEdit;
use ModulesGarden\ggsmodule\Components\Text\Text;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AjaxComponentInterface;

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