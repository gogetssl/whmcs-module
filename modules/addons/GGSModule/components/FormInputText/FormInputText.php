<?php

namespace ModulesGarden\GGSModule\Components\FormInputText;

use ModulesGarden\GGSModule\Core\Components\FormFields\FormField;
use ModulesGarden\GGSModule\Core\Components\Traits\ActionOnChangeTrait;

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
