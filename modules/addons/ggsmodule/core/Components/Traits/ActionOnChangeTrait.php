<?php

namespace ModulesGarden\GGSModule\Core\Components\Traits;

use ModulesGarden\GGSModule\Core\Contracts\Components\ActionInterface;

trait ActionOnChangeTrait
{
    use ActionsTrait;

    public function onChange(ActionInterface $action): self
    {
        $this->addAction('onChange', $action);

        return $this;
    }
}