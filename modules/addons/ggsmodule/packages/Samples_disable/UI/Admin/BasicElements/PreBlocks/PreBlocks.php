<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\BasicElements\PreBlocks;

use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\ggsmodule\Core\Contracts\Components\ClientAreaInterface;
use ModulesGarden\ggsmodule\Core\UI\Interfaces\ClientArea;

class PreBlocks extends \ModulesGarden\ggsmodule\Components\Container\Container implements AdminAreaInterface, ClientAreaInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new PreBlockAjax());
        $this->addElement(new PreBlockStatic());
    }
}
