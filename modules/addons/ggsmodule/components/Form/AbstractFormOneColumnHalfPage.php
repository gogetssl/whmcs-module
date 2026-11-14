<?php

namespace ModulesGarden\GGSModule\Components\Form;

use ModulesGarden\GGSModule\Components\Form\Builder\BuilderCreator;

abstract class AbstractFormOneColumnHalfPage extends AbstractForm
{
    public function __construct()
    {
        parent::__construct();

        $this->builder = BuilderCreator::oneColumnHalfPage($this);
    }
}