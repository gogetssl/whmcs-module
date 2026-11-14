<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\ComplexElements\Modals;

use ModulesGarden\GGSModule\Components\Modal\Modal;
use ModulesGarden\GGSModule\Components\Modal\ModalEdit;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\ComplexElements\Forms\SwitchersForm;

class SwitchersModal extends ModalEdit
{
    public function loadHtml(): void
    {
        $this->addElement(new SwitchersForm());
        $this->setSize(Modal::SIZE_LARGE);
    }
}