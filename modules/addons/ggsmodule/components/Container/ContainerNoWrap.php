<?php

namespace ModulesGarden\GGSModule\Components\Container;

use ModulesGarden\GGSModule\Components\Container\Container;
use ModulesGarden\GGSModule\Core\Contracts\Components\ComponentContainerInterface;

/**
 * Class Form
 */
class ContainerNoWrap extends Container implements ComponentContainerInterface
{
    protected $css = 'lu-text-nowrap';
}
