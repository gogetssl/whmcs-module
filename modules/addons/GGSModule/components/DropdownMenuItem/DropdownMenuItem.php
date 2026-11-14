<?php

namespace ModulesGarden\GGSModule\Components\DropdownMenuItem;

use ModulesGarden\GGSModule\Components\Button\Button;
use ModulesGarden\GGSModule\Core\Contracts\Components\DropdownMenuItemInterface;

class DropdownMenuItem extends Button implements DropdownMenuItemInterface
{
    public const COMPONENT = 'DropdownMenuItem';

    public function __construct()
    {
        parent::__construct();

        $this->setTranslations([
            'title',
        ]);
    }
}
