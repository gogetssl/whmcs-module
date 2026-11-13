<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\DataTable\Modals;

use ModulesGarden\ggsmodule\Components\Modal;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AjaxComponentInterface;

class UserDelete extends Modal\ModalDanger implements AdminAreaInterface, AjaxComponentInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new \ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\DataTable\Forms\UserDelete());
        $this->setContent($this->translate('content'));
    }
}
