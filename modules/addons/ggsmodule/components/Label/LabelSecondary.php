<?php

namespace ModulesGarden\ggsmodule\Components\Label;

use ModulesGarden\ggsmodule\Core\Components\Enums\Color;

/**
 * Class Form
 */
class LabelSecondary extends Label
{
    public function __construct()
    {
        parent::__construct();

        $this->setType(Color::SECONDARY);
    }
}
