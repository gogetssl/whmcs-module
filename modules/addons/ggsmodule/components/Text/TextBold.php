<?php

namespace ModulesGarden\ggsmodule\Components\Text;

use ModulesGarden\ggsmodule\Core\Components\Decorator\Decorator;

class TextBold extends Text
{
    public function __construct()
    {
        parent::__construct();

        (new Decorator($this))->font()->setBoldWeight();
    }
}