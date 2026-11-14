<?php

namespace ModulesGarden\GGSModule\Components\Tagger;

use ModulesGarden\GGSModule\Components\Dropdown\Dropdown;

class Tagger extends Dropdown
{
    public function __construct()
    {
        parent::__construct();

        $this->setMultiple(true);
        $this->setAllowToCreate(true);
    }
}
