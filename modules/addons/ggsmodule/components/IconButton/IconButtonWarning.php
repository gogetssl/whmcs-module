<?php

namespace ModulesGarden\ggsmodule\Components\IconButton;

use ModulesGarden\ggsmodule\Core\Components\Enums\Color;

/**
 * Class IconButton
 */
class IconButtonWarning extends IconButton
{
    public function __construct()
    {
        parent::__construct();
        $this->setType(Color::WARNING);
    }
}
