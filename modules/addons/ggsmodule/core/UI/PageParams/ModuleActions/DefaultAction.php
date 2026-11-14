<?php

namespace ModulesGarden\GGSModule\Core\UI\PageParams\ModuleActions;

use ModulesGarden\GGSModule\Core\UI\PageParams\Source\ModuleActionInterface;

class DefaultAction implements ModuleActionInterface
{

    public function selectAppropriateParameters(array $params): array
    {
        return [];
    }
}