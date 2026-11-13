<?php

namespace ModulesGarden\ggsmodule\Components\ConfigurationVendorSelect;

use ModulesGarden\ggsmodule\Core\Components\FormFields\FormField;
use ModulesGarden\ggsmodule\Core\Components\Traits\OptionsTrait;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AvailableOptionsInterface;

class ConfigurationVendorSelect extends FormField implements AvailableOptionsInterface
{
    use OptionsTrait;

    public const COMPONENT = 'ConfigurationVendorSelect';
}
