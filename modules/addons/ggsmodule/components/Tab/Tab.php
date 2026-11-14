<?php

namespace ModulesGarden\GGSModule\Components\Tab;

use ModulesGarden\GGSModule\Core\Components\AbstractComponent;
use ModulesGarden\GGSModule\Core\Components\Traits\ComponentsContainerTrait;
use ModulesGarden\GGSModule\Core\Components\Traits\ContentTrait;
use ModulesGarden\GGSModule\Core\Components\Traits\TitleTrait;
use ModulesGarden\GGSModule\Core\Contracts\Components\ComponentContainerInterface;

/**
 * Class Tab
 */
class Tab extends AbstractComponent implements ComponentContainerInterface
{
    use ComponentsContainerTrait;
    use TitleTrait;
    use ContentTrait;

    public const COMPONENT = 'Tab';

    public function setActive(bool $active = true):self
    {
        $this->setSlot('isActive', $active);

        return $this;
    }
}
