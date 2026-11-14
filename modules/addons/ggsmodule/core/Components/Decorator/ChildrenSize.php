<?php

namespace ModulesGarden\GGSModule\Core\Components\Decorator;

use ModulesGarden\GGSModule\Core\Components\Enums\DisplayTypes;

class ChildrenSize extends AbstractDecorator
{
    public function fitToParent(): self
    {
        return $this->appendClass(DisplayTypes::FLEX);
    }
}