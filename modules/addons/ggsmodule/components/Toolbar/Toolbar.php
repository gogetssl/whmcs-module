<?php

namespace ModulesGarden\GGSModule\Components\Toolbar;

use ModulesGarden\GGSModule\Core\Components\AbstractComponent;
use ModulesGarden\GGSModule\Core\Components\Traits\ComponentsContainerTrait;
use ModulesGarden\GGSModule\Core\Components\Traits\CssContainerTrait;
use ReflectionException;

/**
 * Class Toolbar
 */
class Toolbar extends AbstractComponent
{
    use ComponentsContainerTrait;
    use CssContainerTrait;

    public const COMPONENT = 'Toolbar';

    /**
     * Toolbar constructor.
     * @param null $id
     * @throws ReflectionException
     */
 
}
