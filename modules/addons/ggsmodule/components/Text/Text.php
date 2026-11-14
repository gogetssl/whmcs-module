<?php

namespace ModulesGarden\GGSModule\Components\Text;

use ModulesGarden\GGSModule\Core\Components\AbstractComponent;
use ModulesGarden\GGSModule\Core\Components\Traits\CssContainerTrait;
use ModulesGarden\GGSModule\Core\Components\Traits\TextTrait;

class Text extends AbstractComponent
{
    use TextTrait;
    use CssContainerTrait;

    public const COMPONENT = 'Text';
}
