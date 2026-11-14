<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\CopyToTarget;

use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\CopyToTarget\Widgets\BaseWidget;

class Container extends \ModulesGarden\GGSModule\Components\Container\Container implements AdminAreaInterface, AjaxComponentInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new BaseWidget());
    }
}