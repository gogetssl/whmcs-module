<?php

namespace ModulesGarden\GGSModule\Components\RowFluid;

use ModulesGarden\GGSModule\Core\Components\AbstractComponent;
use ModulesGarden\GGSModule\Core\Components\Traits\AjaxTrait;
use ModulesGarden\GGSModule\Core\Components\Traits\ComponentsContainerTrait;
use ModulesGarden\GGSModule\Core\Components\Traits\CssContainerTrait;
use ModulesGarden\GGSModule\Core\Contracts\Components\ComponentContainerInterface;

class RowFluid extends AbstractComponent implements ComponentContainerInterface
{
    use AjaxTrait;
    use ComponentsContainerTrait;
    use CssContainerTrait;

    public const COMPONENT = 'RowFluid';
}
