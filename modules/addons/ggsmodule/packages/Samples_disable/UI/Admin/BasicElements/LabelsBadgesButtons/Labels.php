<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\BasicElements\LabelsBadgesButtons;

use ModulesGarden\ggsmodule\Components\Label\Label;
use ModulesGarden\ggsmodule\Components\Label\LabelDanger;
use ModulesGarden\ggsmodule\Components\Label\LabelInfo;
use ModulesGarden\ggsmodule\Components\Label\LabelPrimary;
use ModulesGarden\ggsmodule\Components\Label\LabelSecondary;
use ModulesGarden\ggsmodule\Components\Label\LabelSuccess;
use ModulesGarden\ggsmodule\Components\Label\LabelWarning;
use ModulesGarden\ggsmodule\Components\Toolbar\Toolbar;
use ModulesGarden\ggsmodule\Components\Widget\Widget;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;


class Labels extends Widget implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->setTitle('Labels');

        $bar = new Toolbar();
        $bar->addElement((new LabelWarning())->setText('Label Warning'));
        $bar->addElement((new LabelSuccess())->setText('Label Success'));
        $bar->addElement((new LabelDanger())->setText('Label Danger'));
        $bar->addElement((new LabelInfo())->setText('Label Info'));
        $bar->addElement((new LabelPrimary())->setText('Label Primary'));
        $bar->addElement((new LabelSecondary())->setText('Label Secondary'));
        $bar->addElement((new Label())->setText('Label Info'));

        $bar->addElement((new LabelWarning())->setText('Label Warning')->displayAsStatusLabel());
        $bar->addElement((new LabelSuccess())->setText('Label Success')->displayAsStatusLabel());
        $bar->addElement((new LabelDanger())->setText('Label Danger')->displayAsStatusLabel());
        $bar->addElement((new LabelInfo())->setText('Label Info')->displayAsStatusLabel());
        $bar->addElement((new LabelPrimary())->setText('Label Primary')->displayAsStatusLabel());
        $bar->addElement((new LabelSecondary())->setText('Label Secondary')->displayAsStatusLabel());
        $bar->addElement((new Label())->setText('Label')->displayAsStatusLabel());

        $this->addElement($bar);
    }
}
