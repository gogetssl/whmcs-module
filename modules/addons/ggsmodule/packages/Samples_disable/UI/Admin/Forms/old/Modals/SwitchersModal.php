<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\ComplexElements\Modals;

use ModulesGarden\ggsmodule\Components\Modal\Modal;
use ModulesGarden\ggsmodule\Components\Modal\ModalEdit;
use ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\ComplexElements\Forms\SwitchersForm;

class SwitchersModal extends ModalEdit
{
    public function loadHtml(): void
    {
        $this->addElement(new SwitchersForm());
        $this->setSize(Modal::SIZE_LARGE);
    }
}