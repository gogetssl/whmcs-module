<?php

namespace ModulesGarden\GGSModule\Components\Form;

use ModulesGarden\GGSModule\Components\Form\Builder\BuilderCreator;
use ModulesGarden\GGSModule\Core\Components\Traits\ToolbarTrait;

class Form extends AbstractForm
{
    use ToolbarTrait;

    public function __construct()
    {
        parent::__construct();

        $this->builder = BuilderCreator::simple($this);
    }
}