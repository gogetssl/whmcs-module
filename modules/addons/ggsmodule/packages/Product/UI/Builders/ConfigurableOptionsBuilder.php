<?php

namespace ModulesGarden\ggsmodule\Packages\Product\UI\Builders;

use ModulesGarden\ggsmodule\Components\Container\ContainerColumn;
use ModulesGarden\ggsmodule\Components\Form\AbstractForm;
use ModulesGarden\ggsmodule\Components\Form\Builder\Builder;
use ModulesGarden\ggsmodule\Components\FormGroup\FormGroup;
use ModulesGarden\ggsmodule\Components\FormGroup\FormGroupFullWidth;
use ModulesGarden\ggsmodule\Core\Contracts\Components\FormFieldInterface;
use ModulesGarden\ggsmodule\Packages\Product\UI\GroupBuilders\ConfigOptionSwitcherBuilder;

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