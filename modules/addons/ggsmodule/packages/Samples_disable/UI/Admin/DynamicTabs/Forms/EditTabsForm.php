<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\DynamicTabs\Forms;

use ModulesGarden\GGSModule\Components\Form\Form;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\GGSModule\Components\Dropdown\Dropdown;
use ModulesGarden\GGSModule\Core\DataProviders\CrudProvider;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\DynamicTabs\Providers\EditTabsProvider;

class EditTabsForm extends Form implements AdminAreaInterface, AjaxComponentInterface
{
    protected string $provider = EditTabsProvider::class;
    protected string $providerAction = CrudProvider::ACTION_UPDATE;

    public function loadHtml(): void
    {
        $this->builder->addField((new Dropdown())->setName("tabsNames")->setMultiple());
    }
}