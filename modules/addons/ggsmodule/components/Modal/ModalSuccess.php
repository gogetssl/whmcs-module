<?php

namespace ModulesGarden\ggsmodule\Components\Modal;

use ModulesGarden\ggsmodule\Core\Components\Actions\ModalClose;
use ModulesGarden\ggsmodule\Core\Components\Actions\ModalFormSubmit;

class ModalSuccess extends ModalAction
{
    protected $type = self::TYPE_SUCCESS;

    protected function initActionButtons()
    {
        $this->addActionButton(
            (new \ModulesGarden\ggsmodule\Components\Button\ButtonSuccess())
                ->setTitle($this->translate('submit'))
                ->onClick(new ModalFormSubmit($this))
        );

        $this->addActionButton(
            (new \ModulesGarden\ggsmodule\Components\Button\ButtonCancel())
                ->setTitle($this->translate('cancel'))
                ->onClick(new ModalClose($this))
        );
    }
}
