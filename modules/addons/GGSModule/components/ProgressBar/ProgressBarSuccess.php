<?php

namespace ModulesGarden\GGSModule\Components\ProgressBar;

use ModulesGarden\GGSModule\Core\Components\Enums\BackgroundColor;

class ProgressBarSuccess extends ProgressBar
{
    public function __construct()
    {
        parent::__construct();
        $this->setType(BackgroundColor::SUCCESS);
    }
}