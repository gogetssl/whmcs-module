<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\DataTable\Modals;

use ModulesGarden\GGSModule\Components\Modal;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxComponentInterface;

class UserDelete extends Modal\ModalDanger implements AdminAreaInterface, AjaxComponentInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new \ModulesGarden\GGSModule\Packages\Samples\UI\Admin\DataTable\Forms\UserDelete());
        $this->setContent($this->translate('content'));
    }
}
