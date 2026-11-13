<?php

namespace ModulesGarden\ggsmodule\Components\Alert;

use ModulesGarden\ggsmodule\Core\Components\Enums\Color;

class AlertInfo extends Alert
{
    public function __construct()
    {
        parent::__construct();

        $this->setType(Color::INFO);
    }
}
