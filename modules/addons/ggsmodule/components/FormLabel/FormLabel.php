<?php

namespace ModulesGarden\ggsmodule\Components\FormLabel;

use ModulesGarden\ggsmodule\Core\Components\AbstractComponent;
use ModulesGarden\ggsmodule\Core\Components\Traits\ComponentsContainerTrait;
use ModulesGarden\ggsmodule\Core\Components\Traits\CssContainerTrait;
use ModulesGarden\ggsmodule\Core\Components\Traits\TextTrait;

/**
 * Class Form
 */
class FormLabel extends AbstractComponent
{
    use ComponentsContainerTrait;
    use CssContainerTrait;
    use TextTrait;

    public const COMPONENT = 'FormLabel';
}
