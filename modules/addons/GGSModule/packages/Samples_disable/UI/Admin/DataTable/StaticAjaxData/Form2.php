<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\DataTable\StaticAjaxData;

use ModulesGarden\GGSModule\Components\Form\AbstractForm;
use ModulesGarden\GGSModule\Components\PreBlock\PreBlock;
use ModulesGarden\GGSModule\Core\Components\Actions\PassAjaxData;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxComponentInterface;

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