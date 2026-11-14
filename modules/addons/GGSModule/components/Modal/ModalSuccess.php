<?php

namespace ModulesGarden\GGSModule\Components\Modal;

use ModulesGarden\GGSModule\Core\Components\Actions\ModalClose;
use ModulesGarden\GGSModule\Core\Components\Actions\ModalFormSubmit;

class ModalSuccess extends ModalAction
{
    protected $type = self::TYPE_SUCCESS;

    protected function initActionButtons()
    {
        $this->addActionButton(
            (new \ModulesGarden\GGSModule\Components\Button\ButtonSuccess())
                ->setTitle($this->translate('submit'))
                ->onClick(new ModalFormSubmit($this))
        );

        $this->addActionButton(
            (new \ModulesGarden\GGSModule\Components\Button\ButtonCancel())
                ->setTitle($this->translate('cancel'))
                ->onClick(new ModalClose($this))
        );
    }
}
