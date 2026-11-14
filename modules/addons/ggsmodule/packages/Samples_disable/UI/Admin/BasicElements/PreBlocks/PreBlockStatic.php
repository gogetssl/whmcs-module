<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\BasicElements\PreBlocks;

use ModulesGarden\GGSModule\Components\PreBLock\PreBlock;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;


class PreBlockStatic extends PreBlock implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->setContent('This is sample content of pre block');
    }
}
