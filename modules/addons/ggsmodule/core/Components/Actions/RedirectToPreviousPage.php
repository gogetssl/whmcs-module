<?php

namespace ModulesGarden\ggsmodule\Core\Components\Actions;

use ModulesGarden\ggsmodule\Core\Components\AbstractActionInterface;

class RedirectToPreviousPage extends AbstractActionInterface
{
    public function toArray(): array
    {
        return [
            'action' => 'redirectToPreviousPage',
        ];
    }
}
