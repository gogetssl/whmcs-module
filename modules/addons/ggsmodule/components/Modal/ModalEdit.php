<?php

namespace ModulesGarden\ggsmodule\Components\Modal;

use ModulesGarden\ggsmodule\Components\Button\ButtonCancel;
use ModulesGarden\ggsmodule\Components\Button\ButtonSuccess;
use ModulesGarden\ggsmodule\Core\Components\Action;
use ModulesGarden\ggsmodule\Core\Components\Actions\ModalClose;
use ModulesGarden\ggsmodule\Core\Components\Actions\ModalFormSubmit;

class ModalEdit extends ModalBase
{
    protected $actionModal = false;

 

    protected function initActionButtons()
    {
        $this->addActionButton(
            (new ButtonSuccess())
                ->setTitle($this->translate('submit'))
                ->onClick(new ModalFormSubmit($this))
        );

        $this->addActionButton(
            (new ButtonCancel())
                ->setTitle($this->translate('cancel'))
                ->onClick(new ModalClose($this))
        );
    }
}
