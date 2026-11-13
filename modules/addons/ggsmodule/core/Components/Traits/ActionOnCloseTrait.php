<?php

namespace ModulesGarden\ggsmodule\Core\Components\Traits;

use ModulesGarden\ggsmodule\Core\Contracts\Components\ActionInterface;

trait ActionOnCloseTrait
{
    use ActionsTrait;

    public function onClose(ActionInterface $action): self
    {
        $this->addAction('onClose', $action);

        return $this;
    }
}