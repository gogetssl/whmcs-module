<?php

namespace ModulesGarden\ggsmodule\Core\Components\Decorator;

use ModulesGarden\ggsmodule\Core\Components\Enums\DisplayTypes;

class ChildrenSize extends AbstractDecorator
{
    public function fitToParent(): self
    {
        return $this->appendClass(DisplayTypes::FLEX);
    }
}