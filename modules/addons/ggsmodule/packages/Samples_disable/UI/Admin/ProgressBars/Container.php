<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\ProgressBars;

use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\ProgressBars\Widgets\ProgressBarsWidgetBaseStyles;
use ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\ProgressBars\Widgets\ProgressBarsWidgetSmall;
use ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\ProgressBars\Widgets\ProgressBarsWidgetMedium;
use ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\ProgressBars\Widgets\ProgressBarsWidgetLarge;
use ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\ProgressBars\Widgets\ProgressBarsWidgetStyles;
use ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\ProgressBars\Widgets\ProgressBarsNoLabelWithMarks;

class Container extends \ModulesGarden\ggsmodule\Components\Container\Container implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new ProgressBarsWidgetSmall());
        $this->addElement(new ProgressBarsWidgetMedium());
        $this->addElement(new ProgressBarsWidgetLarge());
        $this->addElement(new ProgressBarsWidgetBaseStyles());
        $this->addElement(new ProgressBarsNoLabelWithMarks());
        $this->addElement(new ProgressBarsWidgetStyles());
    }
}