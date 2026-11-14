<?php

namespace ModulesGarden\GGSModule\Components\NavBarItem;

use ModulesGarden\GGSModule\App\Libs\Icons;
use ModulesGarden\GGSModule\Core\Components\AbstractComponent;
use ModulesGarden\GGSModule\Core\Components\Traits\ComponentsContainerTrait;
use ModulesGarden\GGSModule\Core\Components\Traits\TitleTrait;
use ModulesGarden\GGSModule\Core\Components\Traits\UrlTrait;

/**
 * Class Form
 */
class NavBarItem extends AbstractComponent
{
    use TitleTrait;
    use UrlTrait;
    use ComponentsContainerTrait;

    public const COMPONENT = 'NavBarItem';

 

    public function setActive(bool $active): self
    {
        $this->setSlot('active', $active);

        return $this;
    }

    public function setIcon(string $icon): self
    {
        // inline SVG (the menu config gives "mdi mdi-NAME"); the name only when it has no SVG yet
        $svg = Icons::svg($icon);
        $this->setSlot('icon', $svg !== '' ? $svg : $icon);

        return $this;
    }



    public function addItem(NavBarItem $item): self
    {
        $this->addElement($item);

        return $this;
    }
}
