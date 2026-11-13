<?php

namespace ModulesGarden\ggsmodule\Components\Form\Builder\Builders;

use ModulesGarden\ggsmodule\Core\Contracts\Components\FormFieldInterface;

class HiddenFieldFactory extends AbstractFormFieldFactory
{
    public function create(FormFieldInterface $formField)//: FormFieldInterface
    {
        return $formField;
    }
}
