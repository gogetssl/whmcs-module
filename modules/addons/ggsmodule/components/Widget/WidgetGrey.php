<?php

namespace ModulesGarden\ggsmodule\Components\Widget;

use ModulesGarden\ggsmodule\Core\Components\Decorator\Decorator;

class WidgetGrey extends Widget
{
    public function __construct()
    {
        parent::__construct();

        (new Decorator($this))->background()->setGrey();
    }
}
