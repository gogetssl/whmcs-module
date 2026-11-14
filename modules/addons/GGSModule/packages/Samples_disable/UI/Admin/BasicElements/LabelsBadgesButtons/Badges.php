<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\BasicElements\LabelsBadgesButtons;

use ModulesGarden\GGSModule\Components\Badge\BadgeDanger;
use ModulesGarden\GGSModule\Components\Badge\BadgeInfo;
use ModulesGarden\GGSModule\Components\Badge\BadgeSuccess;
use ModulesGarden\GGSModule\Components\Badge\BadgeWarning;
use ModulesGarden\GGSModule\Components\Toolbar\Toolbar;
use ModulesGarden\GGSModule\Components\Widget\Widget;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;


class Badges extends Widget implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->setTitle('Badges');

        $bar = new Toolbar();

        $bar->addElement((new BadgeDanger())->setText('1'));
        $bar->addElement((new BadgeSuccess())->setText('2'));
        $bar->addElement((new BadgeWarning())->setText('3'));
        $bar->addElement((new BadgeInfo())->setText('4'));

        $this->addElement($bar);
    }
}
