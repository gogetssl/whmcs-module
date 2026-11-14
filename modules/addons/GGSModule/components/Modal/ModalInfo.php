<?php

namespace ModulesGarden\GGSModule\Components\Modal;

use ModulesGarden\GGSModule\Components\Button\ButtonCancel;
use ModulesGarden\GGSModule\Components\Button\ButtonClose;
use ModulesGarden\GGSModule\Core\Components\Actions\ModalClose;

class ModalInfo extends ModalBase
{
    protected $actionModal = false;

 

    protected function initActionButtons()
    {
        $this->addActionButton(
            (new ButtonClose())
                ->setTitle($this->translate('close'))
                ->onClick(new ModalClose($this))
        );
    }
}
