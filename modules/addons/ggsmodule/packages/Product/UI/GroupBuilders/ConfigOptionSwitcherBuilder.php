<?php

namespace ModulesGarden\ggsmodule\Packages\Product\UI\GroupBuilders;

use ModulesGarden\ggsmodule\Components\Form\Builder\GroupBuilders\DefaultBuilder;
use ModulesGarden\ggsmodule\Packages\Product\UI\FieldFactories\ConfigOptionSwitcherFactory;

class ConfigOptionSwitcherBuilder extends DefaultBuilder
{
    protected function findBuilder($name): string
    {
        return ConfigOptionSwitcherFactory::class;
    }
}