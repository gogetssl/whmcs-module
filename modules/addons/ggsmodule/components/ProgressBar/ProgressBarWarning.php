<?php

namespace ModulesGarden\ggsmodule\Components\ProgressBar;

use ModulesGarden\ggsmodule\Core\Components\Enums\BackgroundColor;

class ProgressBarWarning extends ProgressBar
{
    public function __construct()
    {
        parent::__construct();
        $this->setType(BackgroundColor::WARNING);
    }
}