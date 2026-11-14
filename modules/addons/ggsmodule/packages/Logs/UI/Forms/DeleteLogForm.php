<?php

namespace ModulesGarden\GGSModule\Packages\Logs\UI\Forms;

use ModulesGarden\GGSModule\Components\Form\Form;
use ModulesGarden\GGSModule\Components\HiddenField\HiddenField;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\GGSModule\Core\DataProviders\CrudProvider;
use ModulesGarden\GGSModule\Packages\Logs\UI\Providers\DeleteLogProvider;

class DeleteLogForm extends Form implements AjaxComponentInterface, AdminAreaInterface
{
    protected string $provider = DeleteLogProvider::class;
    protected string $providerAction = CrudProvider::ACTION_DELETE;
    protected ?string $providerDefaultAction = null;

    public function loadHtml(): void
    {
        $this->builder->createField(HiddenField::class, 'id');
    }
}
