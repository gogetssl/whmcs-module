<?php

namespace ModulesGarden\ggsmodule\Components\Card;

use ModulesGarden\ggsmodule\Core\Components\AbstractComponent;
use ModulesGarden\ggsmodule\Core\Components\Traits\BorderTrait;
use ModulesGarden\ggsmodule\Core\Components\Traits\ComponentsContainerTrait;
use ModulesGarden\ggsmodule\Core\Components\Traits\ContentTrait;
use ModulesGarden\ggsmodule\Core\Components\Traits\CssContainerTrait;
use ModulesGarden\ggsmodule\Core\Components\Traits\TitleTrait;
use ModulesGarden\ggsmodule\Core\Components\Traits\DescriptionTrait;
use ModulesGarden\ggsmodule\Core\Components\Traits\ToolbarTrait;

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