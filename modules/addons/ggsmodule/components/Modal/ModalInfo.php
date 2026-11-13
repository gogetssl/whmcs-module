<?php

namespace ModulesGarden\ggsmodule\Components\Modal;

use ModulesGarden\ggsmodule\Components\Button\ButtonCancel;
use ModulesGarden\ggsmodule\Components\Button\ButtonClose;
use ModulesGarden\ggsmodule\Core\Components\Actions\ModalClose;

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
