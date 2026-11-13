<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\DataTable\StaticAjaxData;

use ModulesGarden\ggsmodule\Components\Button\ButtonSubmitSuccess;
use ModulesGarden\ggsmodule\Core\Components\Actions\FormSubmit;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AjaxComponentInterface;

class Widget extends \ModulesGarden\ggsmodule\Components\Widget\Widget implements AjaxComponentInterface, AdminAreaInterface
{
    protected string $cid = 'container-xxxx';

    public function loadHtml(): void
    {
        $form = new Form2();

        $this->addElementToToolbar($this->addElement((new ButtonSubmitSuccess())->onClick(new FormSubmit($form))));
        $this->addElement($form);
    }
}