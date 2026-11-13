<?php

namespace ModulesGarden\ggsmodule\Components\RadioButton;

use ModulesGarden\ggsmodule\Core\Components\FormFields\FormField;
use ModulesGarden\ggsmodule\Core\Components\Traits\OptionsTrait;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AvailableOptionsInterface;

class RadioButton extends FormField implements AvailableOptionsInterface
{
    use OptionsTrait;

    public const COMPONENT = 'RadioButton';
}
