<?php

namespace ModulesGarden\ggsmodule\Components\HiddenField;

use ModulesGarden\ggsmodule\Core\Components\FormFields\FormField;
use ModulesGarden\ggsmodule\Core\Contracts\Components\FormFieldHiddenInterface;

class HiddenField extends FormField implements FormFieldHiddenInterface
{
    public const COMPONENT = 'HiddenField';
}
