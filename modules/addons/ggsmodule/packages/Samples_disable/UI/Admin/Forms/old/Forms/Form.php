<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\ComplexElements\Forms;

use ModulesGarden\ggsmodule\Components\Container\ContainerQuarterPage;
use ModulesGarden\ggsmodule\Components\Container\ContainerRow;
use ModulesGarden\ggsmodule\Components\Switcher\Switcher;
use ModulesGarden\ggsmodule\Components\Widget\Widget;
use ModulesGarden\ggsmodule\Core\Components\Actions\CopyValueByClass;

class Form extends \ModulesGarden\ggsmodule\Components\Form\Form
{
    public function loadHtml(): void
    {
        $main = new ContainerRow();
        $this->addElement($main);

        for ($i = 0; $i < 4; $i++)
        {
            $container = new ContainerQuarterPage();
            $main->addElement($container);

            $widget = new Widget();
            $widget->setTitle('Widget ' . +$i);
            $widget->addToToolbar((new Switcher())->onChange(new CopyValueByClass("widget$i")));
            $container->addElement($widget);

            for ($j = 0; $j < 4; $j++)
            {
                $switcher = new Switcher();
                $switcher->setName("name$i$j");
                $switcher->setCss("widget$i");

                $this->builder->addFieldInContainer($widget, $switcher);
            }
        }
    }
}