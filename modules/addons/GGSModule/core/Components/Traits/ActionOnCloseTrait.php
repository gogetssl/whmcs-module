<?php

namespace ModulesGarden\GGSModule\Core\Components\Traits;

use ModulesGarden\GGSModule\Core\Contracts\Components\ActionInterface;

trait ActionOnCloseTrait
{
    use ActionsTrait;

    public function onClose(ActionInterface $action): self
    {
        $this->addAction('onClose', $action);

        return $this;
    }
}