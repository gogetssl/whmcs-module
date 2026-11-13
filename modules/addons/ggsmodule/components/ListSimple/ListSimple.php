<?php

namespace ModulesGarden\ggsmodule\Components\ListSimple;

use ModulesGarden\ggsmodule\Core\Components\AbstractComponent;
use ModulesGarden\ggsmodule\Core\Components\Traits\ComponentsContainerTrait;
use ModulesGarden\ggsmodule\Core\Components\Traits\CssContainerTrait;

class ListSimple extends AbstractComponent
{
    use ComponentsContainerTrait;
    use CssContainerTrait;

    public const COMPONENT = 'ListSimple';

    public function addItem($item): self
    {
        $this->addElement($item);

        return $this;
    }
}
