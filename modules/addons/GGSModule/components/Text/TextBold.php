<?php

namespace ModulesGarden\GGSModule\Components\Text;

use ModulesGarden\GGSModule\Core\Components\Decorator\Decorator;

class TextBold extends Text
{
    public function __construct()
    {
        parent::__construct();

        (new Decorator($this))->font()->setBoldWeight();
    }
}