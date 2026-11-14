<?php

namespace ModulesGarden\GGSModule\Components\Label;

use ModulesGarden\GGSModule\Core\Components\Enums\Color;

/**
 * Class Form
 */
class LabelPrimary extends Label
{
    public function __construct()
    {
        parent::__construct();

        $this->setType(Color::PRIMARY);
    }
}
