<?php

namespace ModulesGarden\ggsmodule\Components\Text;

use ModulesGarden\ggsmodule\Core\Components\AbstractComponent;
use ModulesGarden\ggsmodule\Core\Components\Traits\CssContainerTrait;
use ModulesGarden\ggsmodule\Core\Components\Traits\TextTrait;

class Text extends AbstractComponent
{
    use TextTrait;
    use CssContainerTrait;

    public const COMPONENT = 'Text';
}
