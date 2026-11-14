<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\DataTable\StaticAjaxData;

use ModulesGarden\GGSModule\Components\Form\AbstractForm;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxComponentInterface;

class Form extends AbstractForm implements AjaxComponentInterface, AdminAreaInterface
{
    protected string $provider = FormProvider::class;
}