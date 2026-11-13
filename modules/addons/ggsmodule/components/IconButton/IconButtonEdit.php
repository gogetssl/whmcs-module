<?php

namespace ModulesGarden\ggsmodule\Components\IconButton;

use ModulesGarden\ggsmodule\Core\Components\Enums\Color;

/**
 * Class IconButton
 */
class IconButtonEdit extends IconButtonPrimary
{
    public function __construct()
    {
        parent::__construct();
        $this->setIcon('pencil');
    }
}
