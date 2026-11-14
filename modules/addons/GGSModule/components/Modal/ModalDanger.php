<?php

namespace ModulesGarden\GGSModule\Components\Modal;

use ModulesGarden\GGSModule\Components\Button\ButtonCancel;
use ModulesGarden\GGSModule\Components\Button\ButtonDanger;
use ModulesGarden\GGSModule\Core\Components\Actions\ModalClose;
use ModulesGarden\GGSModule\Core\Components\Actions\ModalFormSubmit;

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
