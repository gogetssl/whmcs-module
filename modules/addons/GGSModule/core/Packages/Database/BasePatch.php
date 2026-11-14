<?php

namespace ModulesGarden\GGSModule\Core\Packages\Database;

abstract class BasePatch implements PatchInterface
{
    public function requires(): array
    {
        return [];
    }
}