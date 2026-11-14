<?php

namespace ModulesGarden\GGSModule\Components\HiddenField;

use ModulesGarden\GGSModule\Core\Components\FormFields\FormField;
use ModulesGarden\GGSModule\Core\Contracts\Components\FormFieldHiddenInterface;

class HiddenField extends FormField implements FormFieldHiddenInterface
{
    public const COMPONENT = 'HiddenField';
}
