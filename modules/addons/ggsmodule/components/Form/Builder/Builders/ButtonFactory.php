<?php

namespace ModulesGarden\ggsmodule\Components\Form\Builder\Builders;

use ModulesGarden\ggsmodule\Components\Container\ContainerFullWidth;
use ModulesGarden\ggsmodule\Core\Contracts\Components\FormFieldInterface;

class ButtonFactory extends AbstractFormFieldFactory
{
    public function create(FormFieldInterface $formField)
    {
        $formGroup = new ContainerFullWidth();
        $formGroup->addElement($formField);

        return $formGroup;
    }
}
