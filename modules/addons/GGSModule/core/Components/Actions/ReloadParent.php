<?php

namespace ModulesGarden\GGSModule\Core\Components\Actions;

use ModulesGarden\GGSModule\Core\Components\AbstractActionInterface;

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
