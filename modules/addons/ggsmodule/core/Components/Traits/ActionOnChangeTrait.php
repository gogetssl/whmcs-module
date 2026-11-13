<?php

namespace ModulesGarden\ggsmodule\Core\Components\Traits;

use ModulesGarden\ggsmodule\Core\Contracts\Components\ActionInterface;

trait ActionOnChangeTrait
{
    use ActionsTrait;

    public function onChange(ActionInterface $action): self
    {
        $this->addAction('onChange', $action);

        return $this;
    }
}