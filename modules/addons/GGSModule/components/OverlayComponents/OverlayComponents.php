<?php

namespace ModulesGarden\GGSModule\Components\OverlayComponents;

use ModulesGarden\GGSModule\Components\Container\Container;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\ClientAreaInterface;

use ModulesGarden\GGSModule\Core\UI\Interfaces\ClientArea;

class OverlayComponents extends Container implements AdminAreaInterface, ClientAreaInterface
{
    public const COMPONENT = 'OverlayComponents';
}
