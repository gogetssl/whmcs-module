<?php

namespace ModulesGarden\GGSModule\Core\Components\Traits;

use ModulesGarden\GGSModule\Core\Contracts\Components\ActionInterface;

trait ActionOnChangeItemTrait
{
    use ActionsTrait;

    public function onItemAdd(ActionInterface $action): self
    {
        $this->addAction('onItemAdd', $action);

        return $this;
    }

    public function onItemRemove(ActionInterface $action): self
    {
        $this->addAction('onItemRemove', $action);

        return $this;
    }
}