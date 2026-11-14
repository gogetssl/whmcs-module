<?php

namespace ModulesGarden\GGSModule\Components\Form\Builder\Builders;

use ModulesGarden\GGSModule\Core\Contracts\Components\FormFieldInterface;

class HiddenFieldFactory extends AbstractFormFieldFactory
{
    public function create(FormFieldInterface $formField)//: FormFieldInterface
    {
        return $formField;
    }
}
