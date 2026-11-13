<?php

namespace ModulesGarden\ggsmodule\Components\Iframe;

use ModulesGarden\ggsmodule\Core\Components\AbstractComponent;
use ModulesGarden\ggsmodule\Core\Components\Traits\AjaxTrait;
use ModulesGarden\ggsmodule\Core\Components\Traits\ComponentsContainerTrait;
use ModulesGarden\ggsmodule\Core\Components\Traits\CssContainerTrait;
use ModulesGarden\ggsmodule\Core\Contracts\Components\ComponentContainerInterface;

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