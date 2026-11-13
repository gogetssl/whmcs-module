<?php

namespace ModulesGarden\ggsmodule\Core\Components\Actions;

use ModulesGarden\ggsmodule\Core\Components\AbstractActionInterface;

class ReloadParent extends AbstractActionInterface
{
    public function toArray(): array
    {
        return [
            'action' => 'emit',
            'event'  => 'reload-parent',
        ];
    }
}
