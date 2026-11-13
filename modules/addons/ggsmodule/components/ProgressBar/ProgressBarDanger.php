<?php

namespace ModulesGarden\ggsmodule\Components\ProgressBar;

use ModulesGarden\ggsmodule\Core\Components\Enums\BackgroundColor;

class ProgressBarDanger extends ProgressBar
{
    public function __construct()
    {
        parent::__construct();
        $this->setType(BackgroundColor::DANGER);
    }
}