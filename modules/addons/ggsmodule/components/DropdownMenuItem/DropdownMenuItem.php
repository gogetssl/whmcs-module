<?php

namespace ModulesGarden\ggsmodule\Components\DropdownMenuItem;

use ModulesGarden\ggsmodule\Components\Button\Button;
use ModulesGarden\ggsmodule\Core\Contracts\Components\DropdownMenuItemInterface;

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
