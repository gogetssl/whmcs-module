<?php

namespace ModulesGarden\ggsmodule\Components\Modal;

use ModulesGarden\ggsmodule\Components\Button\ButtonCancel;
use ModulesGarden\ggsmodule\Components\Button\ButtonDanger;
use ModulesGarden\ggsmodule\Core\Components\Actions\ModalClose;
use ModulesGarden\ggsmodule\Core\Components\Actions\ModalFormSubmit;

class ModalDanger extends ModalAction
{
    protected $type = self::TYPE_DANGER;

    protected function initActionButtons()
    {
        $this->addActionButton(
            (new ButtonDanger())
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
