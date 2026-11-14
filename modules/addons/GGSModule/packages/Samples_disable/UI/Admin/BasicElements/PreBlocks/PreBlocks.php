<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\BasicElements\PreBlocks;

use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\ClientAreaInterface;
use ModulesGarden\GGSModule\Core\UI\Interfaces\ClientArea;

class PreBlocks extends \ModulesGarden\GGSModule\Components\Container\Container implements AdminAreaInterface, ClientAreaInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new PreBlockAjax());
        $this->addElement(new PreBlockStatic());
    }
}
