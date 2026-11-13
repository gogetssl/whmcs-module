<?php

namespace ModulesGarden\ggsmodule\Components\Form\Builder\Builders;

use ModulesGarden\ggsmodule\Components\FormLabel\FormLabel;
use ModulesGarden\ggsmodule\Components\Tooltip\Tooltip;
use ModulesGarden\ggsmodule\Core\Contracts\Components\FormFieldInterface;

class SliderFactory extends AbstractFormFieldFactory
{
    public function create(FormFieldInterface $formField)//: FormFieldInterface
    {
        $label = new FormLabel();
        $label->setCss('lu-form-label');
        $label->setText($this->title);

        if (!empty($this->description))
        {
            $icon = new Tooltip();
            $icon->setTitle($this->description);
            $label->addElement($icon);
        }

        $formGroup = $this->createContainer();
        $formGroup->addElement($label);
        $formGroup->addElement($formField);
        $formGroup->setFieldName($formField->getName());

        return $formGroup;
    }
}