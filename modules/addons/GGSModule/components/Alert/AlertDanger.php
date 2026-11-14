<?php

namespace ModulesGarden\GGSModule\Components\Alert;

use ModulesGarden\GGSModule\Core\Components\Enums\Color;

class AlertDanger extends Alert
{
    public function __construct()
    {
        parent::__construct();

        $this->setType(Color::DANGER);
    }
}
