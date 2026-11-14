<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\BasicElements\Modals\Forms;

use ModulesGarden\GGSModule\Components\Form\Form;
use ModulesGarden\GGSModule\Components\Switcher\Switcher;

class Confirm extends Form
{
    public function loadHtml(): void
    {
        $this->builder->createField(Switcher::class, 'confirm');
    }
}