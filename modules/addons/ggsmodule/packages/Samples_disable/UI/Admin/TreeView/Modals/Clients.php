<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\TreeView\Modals;

use ModulesGarden\ggsmodule\Components\Modal\ModalEdit;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AjaxComponentInterface;

class Clients extends ModalEdit implements AjaxComponentInterface, AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new \ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\TreeView\Forms\Clients());
    }
}