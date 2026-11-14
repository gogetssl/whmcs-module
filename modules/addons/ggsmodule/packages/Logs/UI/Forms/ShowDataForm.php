<?php

namespace ModulesGarden\GGSModule\Packages\Logs\UI\Forms;

use ModulesGarden\GGSModule\Components\Form\Form;
use ModulesGarden\GGSModule\Components\HiddenField\HiddenField;
use ModulesGarden\GGSModule\Components\PreBlockArrayPrint\PreBlockArrayPrint;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\GGSModule\Core\DataProviders\CrudProvider;
use ModulesGarden\GGSModule\Packages\Logs\UI\Providers\ShowDataProvider;

class ShowDataForm extends Form implements AjaxComponentInterface, AdminAreaInterface
{
    protected string $provider = ShowDataProvider::class;
    protected string $providerAction = CrudProvider::ACTION_DELETE;

    public function loadHtml(): void
    {
        $this->builder->createField(HiddenField::class, 'id');
        $this->builder->createField(PreBlockArrayPrint::class, 'data');
    }
}
