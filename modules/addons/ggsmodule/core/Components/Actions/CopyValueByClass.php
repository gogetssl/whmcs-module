<?php

namespace ModulesGarden\GGSModule\Core\Components\Actions;

use ModulesGarden\GGSModule\Core\Components\AbstractActionInterface;

class CopyValueByClass extends AbstractActionInterface
{
    protected string $className;

    public function __construct(string $className)
    {
        $this->className = $className;
    }

    public function toArray(): array
    {
        return [
            'action'    => 'copyValueByClass',
            'className' => $this->className
        ];
    }
}
