<?php

namespace ModulesGarden\ggsmodule\Components\TreeListItem;

use ModulesGarden\ggsmodule\Core\Components\AbstractComponent;
use ModulesGarden\ggsmodule\Core\Components\Traits\ActionOnClickTrait;
use ModulesGarden\ggsmodule\Core\Components\Traits\AjaxTrait;
use ModulesGarden\ggsmodule\Core\Components\Traits\ComponentsContainerTrait;
use ModulesGarden\ggsmodule\Core\Components\Traits\TitleTrait;

/**
 * Class PreBlock
 */
class TreeListItem extends AbstractComponent
{
    use AjaxTrait;
    use TitleTrait;
    use ComponentsContainerTrait;
    use ActionOnClickTrait;

    public const COMPONENT = 'TreeListItem';

    public function setActive(bool $active = true): self
    {
        $this->setSlot('isActive', $active);

        return $this;
    }

    public function setOpen(bool $open = true): self
    {
        $this->setSlot('isOpen', $open);

        return $this;
    }
}
