<?php

namespace ModulesGarden\GGSModule\Components\Card;

use ModulesGarden\GGSModule\Core\Components\AbstractComponent;
use ModulesGarden\GGSModule\Core\Components\Traits\BorderTrait;
use ModulesGarden\GGSModule\Core\Components\Traits\ComponentsContainerTrait;
use ModulesGarden\GGSModule\Core\Components\Traits\ContentTrait;
use ModulesGarden\GGSModule\Core\Components\Traits\CssContainerTrait;
use ModulesGarden\GGSModule\Core\Components\Traits\TitleTrait;
use ModulesGarden\GGSModule\Core\Components\Traits\DescriptionTrait;
use ModulesGarden\GGSModule\Core\Components\Traits\ToolbarTrait;

class Card extends AbstractComponent
{
    use TitleTrait;
    use DescriptionTrait;
    use ContentTrait;
    use ToolbarTrait;
    use ComponentsContainerTrait;
    use CssContainerTrait;
    use BorderTrait;

    public const COMPONENT = 'Card';

    public function addToLeftSidebar($element): self
    {
        $this->addComponent('leftSidebar', $element);

        return $this;
    }

    public function addToRightSidebar($element): self
    {
        $this->addComponent('rightSidebar', $element);

        return $this;
    }
}