<?php

namespace ModulesGarden\GGSModule\Components\Form\Builder\Builders;

use ModulesGarden\GGSModule\Components\Container\ContainerFullWidth;
use ModulesGarden\GGSModule\Core\Contracts\Components\FormFieldInterface;

class ButtonFactory extends AbstractFormFieldFactory
{
    public function create(FormFieldInterface $formField)
    {
        $formGroup = new ContainerFullWidth();
        $formGroup->addElement($formField);

        return $formGroup;
    }
}
