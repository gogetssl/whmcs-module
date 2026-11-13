<?php

namespace ModulesGarden\ggsmodule\Components\HintsBox;

use ModulesGarden\ggsmodule\Components\Hint\Hint;
use ModulesGarden\ggsmodule\Core\Components\AbstractComponent;
use ModulesGarden\ggsmodule\Core\Components\Traits\ComponentsContainerTrait;
use ModulesGarden\ggsmodule\Core\Components\Traits\CssContainerTrait;
use ModulesGarden\ggsmodule\Core\Components\Traits\TitleTrait;
use ModulesGarden\ggsmodule\Core\Components\Traits\ToolbarTrait;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;

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