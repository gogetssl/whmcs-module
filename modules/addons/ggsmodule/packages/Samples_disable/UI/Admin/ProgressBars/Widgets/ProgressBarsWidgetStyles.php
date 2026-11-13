<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\ProgressBars\Widgets;

use ModulesGarden\ggsmodule\Components\ProgressBar\ProgressBar;
use ModulesGarden\ggsmodule\Components\Widget\Widget;
use ModulesGarden\ggsmodule\Core\Components\Enums\BackgroundColor;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AjaxComponentInterface;

class ProgressBarsWidgetStyles extends Widget implements AjaxComponentInterface, AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->setTitle("All Styles Examples Progress Bars");

        $oClass = new \ReflectionClass(new BackgroundColor());

        foreach ($oClass->getConstants() as $type => $class) {
            $bar = (new ProgressBar())->setText($type)->setFill(rand(10,95))->setType($class);
            $this->addElement($bar);
        }
    }
}