<?php

namespace ModulesGarden\GGSModule\Components\FormWizardStep;

use ModulesGarden\GGSModule\Components\Form\Form;
use ModulesGarden\GGSModule\Core\Contracts\Components\ComponentContainerInterface;

class FormWizardStep extends Form implements ComponentContainerInterface
{
    public const COMPONENT = 'FormWizardStep';

    protected string $title = '';

    public function addElement($element): self
    {
        $this->addComponent('elements', $element);

        return $this;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}