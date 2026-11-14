<?php

namespace ModulesGarden\GGSModule\Components\ConfigurationVendorSelect;

use ModulesGarden\GGSModule\Core\Components\FormFields\FormField;
use ModulesGarden\GGSModule\Core\Components\Traits\OptionsTrait;
use ModulesGarden\GGSModule\Core\Contracts\Components\AvailableOptionsInterface;

class ConfigurationVendorSelect extends FormField implements AvailableOptionsInterface
{
    use OptionsTrait;

    public const COMPONENT = 'ConfigurationVendorSelect';
}
