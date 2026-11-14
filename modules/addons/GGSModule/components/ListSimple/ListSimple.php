<?php

namespace ModulesGarden\GGSModule\Components\ListSimple;

use ModulesGarden\GGSModule\Core\Components\AbstractComponent;
use ModulesGarden\GGSModule\Core\Components\Traits\ComponentsContainerTrait;
use ModulesGarden\GGSModule\Core\Components\Traits\CssContainerTrait;

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
