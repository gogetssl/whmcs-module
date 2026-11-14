<?php

namespace ModulesGarden\GGSModule\Components\ModulesGardenConnectionButton;

use ModulesGarden\GGSModule\Core\Components\Traits\TextTrait;
use ModulesGarden\GGSModule\Core\Components\Traits\UrlTrait;
use ModulesGarden\GGSModule\Components\Container\Container;
use ModulesGarden\GGSModule\Core\Components\Traits\ActionOnClickTrait;

class ModulesGardenConnectionButton extends Container
{
    use ActionOnClickTrait;
    use UrlTrait;
    use TextTrait;

    public const COMPONENT = 'ModulesGardenConnectionButton';
}
