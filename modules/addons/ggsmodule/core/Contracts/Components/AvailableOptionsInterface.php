<?php

namespace ModulesGarden\ggsmodule\Core\Contracts\Components;

interface AvailableOptionsInterface
{
    public function setOptions(array $options): self;
}
