<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\DataTable\Modals;

use ModulesGarden\ggsmodule\Components\Modal;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AjaxComponentInterface;

class UserEdit extends Modal\ModalEdit implements AdminAreaInterface, AjaxComponentInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new \ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\DataTable\Forms\UserEdit());
    }
}
