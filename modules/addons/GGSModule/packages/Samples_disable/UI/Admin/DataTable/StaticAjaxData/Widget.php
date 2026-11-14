<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\DataTable\StaticAjaxData;

use ModulesGarden\GGSModule\Components\Button\ButtonSubmitSuccess;
use ModulesGarden\GGSModule\Core\Components\Actions\FormSubmit;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxComponentInterface;

class Widget extends \ModulesGarden\GGSModule\Components\Widget\Widget implements AjaxComponentInterface, AdminAreaInterface
{
    protected string $cid = 'container-xxxx';

    public function loadHtml(): void
    {
        $form = new Form2();

        $this->addElementToToolbar($this->addElement((new ButtonSubmitSuccess())->onClick(new FormSubmit($form))));
        $this->addElement($form);
    }
}