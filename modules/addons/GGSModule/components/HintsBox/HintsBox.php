<?php

namespace ModulesGarden\GGSModule\Components\HintsBox;

use ModulesGarden\GGSModule\Components\Hint\Hint;
use ModulesGarden\GGSModule\Core\Components\AbstractComponent;
use ModulesGarden\GGSModule\Core\Components\Traits\ComponentsContainerTrait;
use ModulesGarden\GGSModule\Core\Components\Traits\CssContainerTrait;
use ModulesGarden\GGSModule\Core\Components\Traits\TitleTrait;
use ModulesGarden\GGSModule\Core\Components\Traits\ToolbarTrait;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;

class HintsBox extends AbstractComponent implements AdminAreaInterface
{
    use TitleTrait;
    use ToolbarTrait;
    use ComponentsContainerTrait;
    use CssContainerTrait;

    public const COMPONENT = 'HintsBox';

    public function addHint(Hint $hint): self
    {
        $this->addComponent('hints', $hint);

        return $this;
    }
}