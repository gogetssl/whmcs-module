<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\TreeView\Forms;

use ModulesGarden\GGSModule\Components\Form\Form;

class Clients extends Form
{
    public function loadHtml(): void
    {
        $this->builder->addField(new \ModulesGarden\GGSModule\Packages\Samples\UI\Admin\TreeView\Dropdowns\Clients());
        $this->builder->addField(new \ModulesGarden\GGSModule\Packages\Samples\UI\Admin\TreeView\Dropdowns\Services());
    }
}