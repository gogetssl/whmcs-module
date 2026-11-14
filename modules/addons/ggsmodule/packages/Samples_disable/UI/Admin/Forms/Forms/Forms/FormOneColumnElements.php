<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\Forms\Forms\Forms;

use ModulesGarden\GGSModule\Components\Form\Builder\BuilderCreator;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxComponentInterface;


class FormOneColumnElements extends AbstractFormElements implements AdminAreaInterface, AjaxComponentInterface
{
    public function __construct()
    {
        parent::__construct();

        $this->builder = BuilderCreator::oneColumnHalfPage($this);
    }
}
