<?php

namespace ModulesGarden\GGSModule\Packages\Product\UI\Builders;

use ModulesGarden\GGSModule\Components\Container\ContainerColumn;
use ModulesGarden\GGSModule\Components\Form\AbstractForm;
use ModulesGarden\GGSModule\Components\Form\Builder\Builder;
use ModulesGarden\GGSModule\Components\FormGroup\FormGroup;
use ModulesGarden\GGSModule\Components\FormGroup\FormGroupFullWidth;
use ModulesGarden\GGSModule\Core\Contracts\Components\FormFieldInterface;
use ModulesGarden\GGSModule\Packages\Product\UI\GroupBuilders\ConfigOptionSwitcherBuilder;

class ConfigurableOptionsBuilder extends Builder
{
    public function __construct(AbstractForm $form)
    {
        parent:: __construct($form);
        $this->setDefaultFormGroup(new FormGroupFullWidth());
        $this->addDefaultContainer(new ContainerColumn());
    }

    public function createGroup(FormFieldInterface $field, bool $showTooltip = true, FormGroup $formGroup = null)
    {
        return (new ConfigOptionSwitcherBuilder($this, $this->form, $this->defaultFormGroup))->build($field, $showTooltip, $formGroup);
    }
}