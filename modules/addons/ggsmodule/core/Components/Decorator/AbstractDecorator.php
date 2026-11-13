<?php

namespace ModulesGarden\ggsmodule\Core\Components\Decorator;

use ModulesGarden\ggsmodule\Core\Contracts\Components\ComponentInterface;

abstract class AbstractDecorator
{
    protected ComponentInterface $component;

    public function __construct(ComponentInterface $component)
    {
        $this->component = $component;
    }

    protected function appendClass(string $cssClassName): self
    {
        $this->component->appendCss($cssClassName);

        return $this;
    }
}