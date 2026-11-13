<?php

namespace ModulesGarden\ggsmodule\Components\Container;

use ModulesGarden\ggsmodule\Components\Container\Container;
use ModulesGarden\ggsmodule\Core\Contracts\Components\ComponentContainerInterface;

/**
 * Class Form
 */
class ContainerNoWrap extends Container implements ComponentContainerInterface
{
    protected $css = 'lu-text-nowrap';
}
