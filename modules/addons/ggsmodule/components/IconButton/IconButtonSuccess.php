<?php

namespace ModulesGarden\ggsmodule\Components\IconButton;

use ModulesGarden\ggsmodule\Core\Components\Enums\Color;

/**
 * Class IconButton
 */
class IconButtonSuccess extends IconButton
{
    public function __construct()
    {
        parent::__construct();
        $this->setType(Color::SUCCESS);
    }
}
