<?php

namespace ModulesGarden\ggsmodule\Components\FormGroup;

use ModulesGarden\ggsmodule\Core\Components\Decorator\Decorator;
use ModulesGarden\ggsmodule\Core\Contracts\Components\FormFieldInterface;

class FormGroupHalfWidth extends FormGroup implements FormFieldInterface
{
    public function __construct()
    {
        parent::__construct();

        (new Decorator($this))->columns()->two();
    }
}
