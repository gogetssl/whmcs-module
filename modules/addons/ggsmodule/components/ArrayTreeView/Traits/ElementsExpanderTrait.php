<?php

namespace ModulesGarden\GGSModule\Components\ArrayTreeView\Traits;

use ModulesGarden\GGSModule\Core\Components\AbstractComponent;

trait ElementsExpanderTrait
{
    protected string|AbstractComponent|null $elementsExpander = null;

    public function setElementsExpander($expander):self
    {
        $this->elementsExpander = $expander;

        return $this;
    }

    public function elementsExpanderSlotBuilder():string|AbstractComponent|null
    {
        return $this->elementsExpander;
    }

}