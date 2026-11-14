<?php

namespace ModulesGarden\GGSModule\Core\Components\Traits;

use ModulesGarden\GGSModule\Core\Contracts\Components\ActionInterface;

trait ActionOnClickTrait
{
    use ActionsTrait;

    public function onClick(ActionInterface $action): self
    {
        $this->addAction('onClick', $action);

        return $this;
    }
}