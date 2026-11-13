<?php

namespace ModulesGarden\ggsmodule\Components\Form;

use ModulesGarden\ggsmodule\Components\Form\Builder\BuilderCreator;
use ModulesGarden\ggsmodule\Core\Components\Traits\ToolbarTrait;

class Form extends AbstractForm
{
    use ToolbarTrait;

    public function __construct()
    {
        parent::__construct();

        $this->builder = BuilderCreator::simple($this);
    }
}