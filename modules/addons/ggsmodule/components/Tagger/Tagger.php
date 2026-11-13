<?php

namespace ModulesGarden\ggsmodule\Components\Tagger;

use ModulesGarden\ggsmodule\Components\Dropdown\Dropdown;

class Tagger extends Dropdown
{
    public function __construct()
    {
        parent::__construct();

        $this->setMultiple(true);
        $this->setAllowToCreate(true);
    }
}
