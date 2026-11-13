<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\DataTable\StaticAjaxData;

use ModulesGarden\ggsmodule\Components\Modal\ModalSuccess;

class Modal extends ModalSuccess
{
    public function loadHtml(): void
    {
        $this->addElement(new Form());
    }
}