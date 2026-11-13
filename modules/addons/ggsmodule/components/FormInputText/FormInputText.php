<?php

namespace ModulesGarden\ggsmodule\Components\FormInputText;

use ModulesGarden\ggsmodule\Core\Components\FormFields\FormField;
use ModulesGarden\ggsmodule\Core\Components\Traits\ActionOnChangeTrait;

/**
 * Class IconButton
 */
class FormInputText extends FormField
{
    public const COMPONENT = 'FormInputText';

    public function setType(string $type): self
    {
        $this->setSlot('type', $type);

        return $this;
    }
}
