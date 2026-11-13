<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\ElementsListComponent\Buttons;

use ModulesGarden\ggsmodule\Components\IconButton\IconButton;

class ButtonDelete extends IconButton
{
    public function __construct()
    {
        parent::__construct();
        $this->setIcon('delete');
    }
}