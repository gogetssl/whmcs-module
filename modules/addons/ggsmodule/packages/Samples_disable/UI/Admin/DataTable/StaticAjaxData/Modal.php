<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\DataTable\StaticAjaxData;

use ModulesGarden\GGSModule\Components\Modal\ModalSuccess;

class Modal extends ModalSuccess
{
    public function loadHtml(): void
    {
        $this->addElement(new Form());
    }
}