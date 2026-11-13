<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\BasicElements\Alerts;

use ModulesGarden\ggsmodule\Components\Alert\AlertDanger;
use ModulesGarden\ggsmodule\Components\Alert\AlertInfo;
use ModulesGarden\ggsmodule\Components\Alert\AlertSuccess;
use ModulesGarden\ggsmodule\Components\Alert\AlertWarning;
use ModulesGarden\ggsmodule\Components\Widget\Widget;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;


class Alerts extends \ModulesGarden\ggsmodule\Components\Container\Container implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $widget = new Widget();
        $widget->setTitle('Alerts');

        $widget->addElement((new AlertDanger())->setText('Alert Danger'));
        $widget->addElement((new AlertInfo())->setText('Alert Info'));
        $widget->addElement((new AlertSuccess())->setText('Alert Success'));
        $widget->addElement((new AlertWarning())->setText('Alert Warning'));

        $widget->addElement((new AlertDanger())->setText($this->translate('Alert Danger with outline'))->setOutline());
        $widget->addElement((new AlertInfo())->setText('Alert Info with outline')->setOutline());
        $widget->addElement((new AlertSuccess())->setText('Alert Success with outline')->setOutline());
        $widget->addElement((new AlertWarning())->setText('Alert Warning with outline')->setOutline());

        $widget->addElement((new AlertDanger())->setText('Alert Danger with dismiss button')->showDismissButton());
        $widget->addElement((new AlertInfo())->setText('Alert Info with dismiss button')->showDismissButton());
        $widget->addElement((new AlertSuccess())->setText('Alert Success with dismiss button')->showDismissButton());
        $widget->addElement((new AlertWarning())->setText('Alert Warning with dismiss button')->showDismissButton());

        $widget->addElement((new AlertDanger())->setText('Alert Danger with outline and dismiss button')->setOutline()->showDismissButton());
        $widget->addElement((new AlertInfo())->setText('Alert Info with outline and dismiss button')->setOutline()->showDismissButton());
        $widget->addElement((new AlertSuccess())->setText('Alert Success with outline and dismiss button')->setOutline()->showDismissButton());
        $widget->addElement((new AlertWarning())->setText('Alert Warning with outline and dismiss button')->setOutline()->showDismissButton());

        $this->addElement($widget);
    }
}
