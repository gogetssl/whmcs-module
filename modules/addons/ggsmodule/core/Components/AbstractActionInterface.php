<?php

namespace ModulesGarden\GGSModule\Core\Components;

use JsonSerializable;

class AbstractActionInterface implements JsonSerializable, \ModulesGarden\GGSModule\Core\Contracts\Components\ActionInterface
{
    #[\ReturnTypeWillChange]
    public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    public function toArray(): array
    {
        return [];
    }
}
