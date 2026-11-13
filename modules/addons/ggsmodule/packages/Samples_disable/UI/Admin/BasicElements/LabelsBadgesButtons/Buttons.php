<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\BasicElements\LabelsBadgesButtons;

use ModulesGarden\ggsmodule\Components\Button\ButtonDanger;
use ModulesGarden\ggsmodule\Components\Button\ButtonInfo;
use ModulesGarden\ggsmodule\Components\Button\ButtonPrimary;
use ModulesGarden\ggsmodule\Components\Button\ButtonSuccess;
use ModulesGarden\ggsmodule\Components\Button\ButtonWarning;
use ModulesGarden\ggsmodule\Components\Toolbar\Toolbar;
use ModulesGarden\ggsmodule\Components\Widget\Widget;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;


class Buttons extends Widget implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->setTitle('Buttons');

        $bar = new Toolbar();

        $bar->addElement((new ButtonSuccess())->setTitle('Button Success'));
        $bar->addElement((new ButtonDanger())->setTitle('Button Danger'));
        $bar->addElement((new ButtonWarning())->setTitle('Button Warning'));
        $bar->addElement((new ButtonInfo())->setTitle('Button Info'));
        $bar->addElement((new ButtonPrimary())->setTitle('Button Primary'));

        $bar->addElement((new ButtonSuccess())->setTitle('Button Success')->setIcon('plus'));
        $bar->addElement((new ButtonDanger())->setTitle('Button Danger')->setIcon('plus'));
        $bar->addElement((new ButtonWarning())->setTitle('Button Warning')->setIcon('plus'));
        $bar->addElement((new ButtonInfo())->setTitle('Button Info')->setIcon('plus'));
        $bar->addElement((new ButtonPrimary())->setTitle('Button Primary')->setIcon('plus'));

        $this->addElement($bar);
    }
}
