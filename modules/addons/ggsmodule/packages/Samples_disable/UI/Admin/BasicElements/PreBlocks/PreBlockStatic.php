<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\BasicElements\PreBlocks;

use ModulesGarden\ggsmodule\Components\PreBLock\PreBlock;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;


class PreBlockStatic extends PreBlock implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->setContent('This is sample content of pre block');
    }
}
