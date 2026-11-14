<?php

namespace ModulesGarden\GGSModule\Components\Form\Builder\Builders;

use ModulesGarden\GGSModule\Components\Container\Container;
use ModulesGarden\GGSModule\Components\Form\Builder\Builder;
use ModulesGarden\GGSModule\Components\FormGroup\FormGroup;
use ModulesGarden\GGSModule\Core\Contracts\Components\FormFieldInterface;

abstract class AbstractFormFieldFactory
{
    protected $formBuilder;
    protected $formGroup;
    protected string $description = '';
    protected string $title = '';

    /**
     * @var callable
     */
    private $translate;

    public function __construct(Builder $formBuilder)
    {
        $this->formBuilder = $formBuilder;
    }

    abstract public function create(FormFieldInterface $formField);

    /**
     * @param FormGroup $formGroup
     * @return $this
     */
    public function withFormGroup(FormGroup $formGroup): self
    {
        $this->formGroup = $formGroup;

        return $this;
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return Container
     */
    protected function createContainer(): FormGroup
    {
        return clone $this->formGroup;
    }
}
