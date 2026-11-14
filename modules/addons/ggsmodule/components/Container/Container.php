<?php

namespace ModulesGarden\GGSModule\Components\Container;

use ModulesGarden\GGSModule\Core\Components\AbstractComponent;
use ModulesGarden\GGSModule\Core\Components\Traits\AjaxTrait;
use ModulesGarden\GGSModule\Core\Components\Traits\BorderTrait;
use ModulesGarden\GGSModule\Core\Components\Traits\ComponentsContainerTrait;
use ModulesGarden\GGSModule\Core\Components\Traits\CssContainerTrait;
use ModulesGarden\GGSModule\Core\Contracts\Components\ComponentContainerInterface;

/**
 * Class Form
 */
class Container extends AbstractComponent implements ComponentContainerInterface
{
    use AjaxTrait;
    use ComponentsContainerTrait;
    use CssContainerTrait;

    public const COMPONENT = 'Container';

    public function setContent($content)
    {
        $this->setSlot('content', $content);
    }
}
