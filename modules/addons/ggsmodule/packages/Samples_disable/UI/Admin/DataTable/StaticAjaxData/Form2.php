<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\DataTable\StaticAjaxData;

use ModulesGarden\ggsmodule\Components\Form\AbstractForm;
use ModulesGarden\ggsmodule\Components\PreBlock\PreBlock;
use ModulesGarden\ggsmodule\Core\Components\Actions\PassAjaxData;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AjaxComponentInterface;

class Form2 extends AbstractForm implements AdminAreaInterface, AjaxComponentInterface
{
    public function loadHtml(): void
    {
        $this->onSubmit((new PassAjaxData((new DataTable())->getId())));
    }

    public function loadData(): void
    {
        $pre = new PreBlock();
        $pre->setContent(print_r($_REQUEST, true));
        $this->addElement($pre);
    }
}