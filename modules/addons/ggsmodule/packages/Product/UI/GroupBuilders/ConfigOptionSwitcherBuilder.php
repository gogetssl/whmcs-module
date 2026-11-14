<?php

namespace ModulesGarden\GGSModule\Packages\Product\UI\GroupBuilders;

use ModulesGarden\GGSModule\Components\Form\Builder\GroupBuilders\DefaultBuilder;
use ModulesGarden\GGSModule\Packages\Product\UI\FieldFactories\ConfigOptionSwitcherFactory;

class ConfigOptionSwitcherBuilder extends DefaultBuilder
{
    protected function findBuilder($name): string
    {
        return ConfigOptionSwitcherFactory::class;
    }
}