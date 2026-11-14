<?php

namespace ModulesGarden\GGSModule\Core\UI\PageParams\Source;

interface ModuleActionInterface
{
    public function selectAppropriateParameters(array $params): array;
}