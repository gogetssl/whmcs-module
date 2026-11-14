<?php

namespace ModulesGarden\GGSModule\Components\Widget;

use ModulesGarden\GGSModule\Core\Components\Decorator\Decorator;

class WidgetGrey extends Widget
{
    public function __construct()
    {
        parent::__construct();

        (new Decorator($this))->background()->setGrey();
    }
}
