<?php

namespace ModulesGarden\GGSModule\Components\RadioButton;

use ModulesGarden\GGSModule\Core\Components\FormFields\FormField;
use ModulesGarden\GGSModule\Core\Components\Traits\OptionsTrait;
use ModulesGarden\GGSModule\Core\Contracts\Components\AvailableOptionsInterface;

class RadioButton extends FormField implements AvailableOptionsInterface
{
    use OptionsTrait;

    public const COMPONENT = 'RadioButton';
}
