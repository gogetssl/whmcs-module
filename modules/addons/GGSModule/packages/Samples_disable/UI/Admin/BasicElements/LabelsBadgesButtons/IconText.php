<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\BasicElements\LabelsBadgesButtons;

use ModulesGarden\GGSModule\Components\Toolbar\Toolbar;
use ModulesGarden\GGSModule\Components\Widget\Widget;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;


class IconText extends Widget implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->setTitle('Icon Text');

        $bar = new Toolbar();

        $bar->addElement((new \ModulesGarden\GGSModule\Components\IconText\IconText())->setIcon('plus')->setTitle('Plus'));

        $this->addElement($bar);
    }
}
