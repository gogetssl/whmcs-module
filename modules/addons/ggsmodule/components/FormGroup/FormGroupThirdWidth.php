<?php

namespace ModulesGarden\GGSModule\Components\FormGroup;

use ModulesGarden\GGSModule\Core\Components\Decorator\Decorator;
use ModulesGarden\GGSModule\Core\Contracts\Components\FormFieldInterface;

class FormGroupThirdWidth extends FormGroup implements FormFieldInterface
{
    public function __construct()
    {
        parent::__construct();

        (new Decorator($this))->columns()->three();
    }
}