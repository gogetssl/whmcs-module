<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\TreeView\Forms;

use ModulesGarden\ggsmodule\Components\Form\Form;

class Clients extends Form
{
    public function loadHtml(): void
    {
        $this->builder->addField(new \ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\TreeView\Dropdowns\Clients());
        $this->builder->addField(new \ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\TreeView\Dropdowns\Services());
    }
}