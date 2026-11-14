<?php

namespace ModulesGarden\GGSModule\App\UI\Admin\AutomationQueue\Index\DataTables\Queue\Forms;

use ModulesGarden\GGSModule\App\UI\Admin\AutomationQueue\Index\DataTables\Queue\Providers\ResetTaskProvider;
use ModulesGarden\GGSModule\Components\Form\Form;
use ModulesGarden\GGSModule\Components\HiddenField\HiddenField;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\GGSModule\Core\DataProviders\CrudProvider;

class ResetTaskForm extends Form implements AjaxComponentInterface, AdminAreaInterface
{
    protected string $provider = ResetTaskProvider::class;
    // Default action "read" generates the integrity token for "id" (required by "update") - the modal has to be loaded via modalLoad
    protected string $providerAction = CrudProvider::ACTION_UPDATE;

    public function loadHtml(): void
    {
        $this->builder->createField(HiddenField::class, 'id');
    }
}
