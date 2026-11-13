<?php

namespace ModulesGarden\ggsmodule\Components\Form;

use ModulesGarden\ggsmodule\Components\Form\Builder\BuilderCreator;

abstract class AbstractFormOneColumn extends AbstractForm
{
    public function __construct()
    {
        parent::__construct();

        $this->builder = BuilderCreator::oneColumn($this);
    }
}