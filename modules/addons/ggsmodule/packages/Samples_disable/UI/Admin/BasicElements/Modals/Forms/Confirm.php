<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\BasicElements\Modals\Forms;

use ModulesGarden\ggsmodule\Components\Form\Form;
use ModulesGarden\ggsmodule\Components\Switcher\Switcher;

class Confirm extends Form
{
    public function loadHtml(): void
    {
        $this->builder->createField(Switcher::class, 'confirm');
    }
}