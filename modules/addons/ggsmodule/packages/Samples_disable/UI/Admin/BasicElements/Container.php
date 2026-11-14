<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\BasicElements;

use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\BasicElements\LabelsBadgesButtons\LabelsBadgesButtons;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\BasicElements\Modals\Modals;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\BasicElements\PreBlocks\PreBlocks;

class Container extends \ModulesGarden\GGSModule\Components\Container\Container implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new Alerts\Alerts());
        $this->addElement(new LabelsBadgesButtons());
        $this->addElement(new Modals());
        $this->addElement(new PreBlocks());
    }
}