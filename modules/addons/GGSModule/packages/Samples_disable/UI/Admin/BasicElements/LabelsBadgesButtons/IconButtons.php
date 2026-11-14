<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\BasicElements\LabelsBadgesButtons;

use ModulesGarden\GGSModule\Components\Container\Container;
use ModulesGarden\GGSModule\Components\IconButton\IconButtonDanger;
use ModulesGarden\GGSModule\Components\IconButton\IconButtonEdit;
use ModulesGarden\GGSModule\Components\IconButton\IconButtonInfo;
use ModulesGarden\GGSModule\Components\IconButton\IconButtonPrimary;
use ModulesGarden\GGSModule\Components\IconButton\IconButtonSuccess;
use ModulesGarden\GGSModule\Components\IconButton\IconButtonWarning;
use ModulesGarden\GGSModule\Components\Widget\Widget;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;


class IconButtons extends Widget implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->setTitle('Icon Buttons');

        $bar = new Container();

        $bar->addElement((new IconButtonDanger())->setIcon('delete')->setTitle('IconButtonDanger'));
        $bar->addElement((new IconButtonInfo())->setIcon('shape')->setTitle('IconButtonInfo'));
        $bar->addElement((new IconButtonWarning())->setIcon('google')->setTitle('IconButtonWarning'));
        $bar->addElement((new IconButtonSuccess())->setIcon('abacus')->setTitle('IconButtonSuccess'));
        $bar->addElement((new IconButtonEdit())->setTitle('IconButtonEdit'));
        $bar->addElement((new IconButtonPrimary())->setIcon('airplane')->setTitle('IconButtonPrimary'));

        $this->addElement($bar);
    }

}
