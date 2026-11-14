<?php

namespace ModulesGarden\GGSModule\Core\Components\Actions;

use ModulesGarden\GGSModule\Core\Components\AbstractActionInterface;

class RedirectToPreviousPage extends AbstractActionInterface
{
    public function toArray(): array
    {
        return [
            'action' => 'redirectToPreviousPage',
        ];
    }
}
