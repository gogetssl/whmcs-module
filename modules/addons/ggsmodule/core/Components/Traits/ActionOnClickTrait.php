<?php

namespace ModulesGarden\ggsmodule\Core\Components\Traits;

use ModulesGarden\ggsmodule\Core\Contracts\Components\ActionInterface;

trait ActionOnClickTrait
{
    use ActionsTrait;

    public function onClick(ActionInterface $action): self
    {
        $this->addAction('onClick', $action);

        return $this;
    }
}