<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\BasicElements\LabelsBadgesButtons;

use ModulesGarden\ggsmodule\Components\Container\Container;
use ModulesGarden\ggsmodule\Components\IconButton\IconButtonDanger;
use ModulesGarden\ggsmodule\Components\IconButton\IconButtonEdit;
use ModulesGarden\ggsmodule\Components\IconButton\IconButtonInfo;
use ModulesGarden\ggsmodule\Components\IconButton\IconButtonPrimary;
use ModulesGarden\ggsmodule\Components\IconButton\IconButtonSuccess;
use ModulesGarden\ggsmodule\Components\IconButton\IconButtonWarning;
use ModulesGarden\ggsmodule\Components\Widget\Widget;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;


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
