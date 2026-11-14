<?php

namespace ModulesGarden\GGSModule\Components\Badge;

use ModulesGarden\GGSModule\Core\Components\Enums\Color;

/**
 * Class Form
 */
class BadgeDanger extends Badge
{
    public function __construct()
    {
        parent::__construct();
        $this->setType(Color::DANGER);
    }
}
