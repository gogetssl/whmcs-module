<?php

namespace ModulesGarden\GGSModule\Components\Iframe;

use ModulesGarden\GGSModule\Core\Components\AbstractComponent;
use ModulesGarden\GGSModule\Core\Components\Traits\AjaxTrait;
use ModulesGarden\GGSModule\Core\Components\Traits\ComponentsContainerTrait;
use ModulesGarden\GGSModule\Core\Components\Traits\CssContainerTrait;
use ModulesGarden\GGSModule\Core\Contracts\Components\ComponentContainerInterface;

class Iframe extends AbstractComponent implements ComponentContainerInterface
{
    use AjaxTrait;
    use ComponentsContainerTrait;
    use CssContainerTrait;

    public const COMPONENT = 'Iframe';

    public function setContent($content):self
    {
        $this->setSlot('content', $content);

        return $this;
    }
}