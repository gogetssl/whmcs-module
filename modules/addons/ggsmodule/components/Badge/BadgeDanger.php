<?php

namespace ModulesGarden\ggsmodule\Components\Badge;

use ModulesGarden\ggsmodule\Core\Components\Enums\Color;

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
