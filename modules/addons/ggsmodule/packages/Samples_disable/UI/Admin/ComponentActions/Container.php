<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\ComponentActions;

use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\CollapsableBox\Widgets\AccordionWidget;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\CollapsableBox\Widgets\BaseWidget;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\ComponentActions\DownloadFile\Widgets\Widget;

class Container extends \ModulesGarden\GGSModule\Components\Container\Container implements AdminAreaInterface, AjaxComponentInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new Widget());
    }
}