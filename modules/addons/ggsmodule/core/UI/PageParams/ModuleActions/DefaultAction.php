<?php

namespace ModulesGarden\ggsmodule\Core\UI\PageParams\ModuleActions;

use ModulesGarden\ggsmodule\Core\UI\PageParams\Source\ModuleActionInterface;

class DefaultAction implements ModuleActionInterface
{

    public function selectAppropriateParameters(array $params): array
    {
        return [];
    }
}