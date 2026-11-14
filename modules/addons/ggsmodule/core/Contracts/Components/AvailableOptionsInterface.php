<?php

namespace ModulesGarden\GGSModule\Core\Contracts\Components;

interface AvailableOptionsInterface
{
    public function setOptions(array $options): self;
}
