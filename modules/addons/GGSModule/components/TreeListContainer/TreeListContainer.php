<?php

namespace ModulesGarden\GGSModule\Components\TreeListContainer;

use ModulesGarden\GGSModule\Core\Components\AbstractComponent;
use ModulesGarden\GGSModule\Core\Components\Traits\AjaxTrait;
use ModulesGarden\GGSModule\Core\Components\Traits\ComponentsContainerTrait;

/**
 * Class PreBlock
 */
class TreeListContainer extends AbstractComponent
{
    use AjaxTrait;
    use ComponentsContainerTrait;

    public const COMPONENT = 'TreeListContainer';

    public function openOnActiveItems(bool $openOnActiveItems = true): self
    {
        $this->setSlot('openOnActiveItems', $openOnActiveItems);

        return $this;
    }
}
