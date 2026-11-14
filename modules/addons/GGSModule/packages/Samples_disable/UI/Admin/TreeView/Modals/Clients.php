<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\TreeView\Modals;

use ModulesGarden\GGSModule\Components\Modal\ModalEdit;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxComponentInterface;

class Clients extends ModalEdit implements AjaxComponentInterface, AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new \ModulesGarden\GGSModule\Packages\Samples\UI\Admin\TreeView\Forms\Clients());
    }
}