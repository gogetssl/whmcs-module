<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\CopyToTarget\Widgets;

use ModulesGarden\ggsmodule\Components\Widget\Widget;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\CopyToTarget\Forms\BaseForm;

class BaseWidget extends Widget implements AjaxComponentInterface, AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->setTitle("Copy To Target Sample");

        $this->addElement(new BaseForm());
    }
}