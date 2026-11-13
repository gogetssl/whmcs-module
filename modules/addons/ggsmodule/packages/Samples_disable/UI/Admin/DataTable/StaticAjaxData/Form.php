<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\DataTable\StaticAjaxData;

use ModulesGarden\ggsmodule\Components\Form\AbstractForm;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AjaxComponentInterface;

class Form extends AbstractForm implements AjaxComponentInterface, AdminAreaInterface
{
    protected string $provider = FormProvider::class;
}