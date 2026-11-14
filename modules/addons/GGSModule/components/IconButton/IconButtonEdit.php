<?php

namespace ModulesGarden\GGSModule\Components\IconButton;

use ModulesGarden\GGSModule\Core\Components\Enums\Color;

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
