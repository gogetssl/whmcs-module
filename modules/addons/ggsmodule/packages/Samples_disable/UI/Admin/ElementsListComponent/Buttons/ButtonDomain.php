<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\ElementsListComponent\Buttons;

use ModulesGarden\GGSModule\Components\IconButton\IconButton;

class ButtonDomain extends IconButton
{
    public function __construct()
    {
        parent::__construct();
        $this->setIcon('globe-alt');
    }
}