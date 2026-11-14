<?php

namespace ModulesGarden\GGSModule\Components\IconButton;

use ModulesGarden\GGSModule\Core\Components\Enums\Color;

/**
 * Class IconButton
 */
class IconButtonInfo extends IconButton
{
    public function __construct()
    {
        parent::__construct();
        $this->setType(Color::INFO);
    }
}
