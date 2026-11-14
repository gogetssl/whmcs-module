<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\BasicElements\LabelsBadgesButtons;

use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;

class LabelsBadgesButtons extends \ModulesGarden\GGSModule\Components\Container\Container implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new Labels());
        $this->addElement(new Badges());
        $this->addElement(new Buttons());
        $this->addElement(new IconButtons());
        $this->addElement(new IconText());
        $this->addElement(new IconsAll());
        $this->addElement(new BurgerButtons());
    }
}
