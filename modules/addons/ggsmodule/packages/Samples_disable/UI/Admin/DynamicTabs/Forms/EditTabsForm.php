<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\DynamicTabs\Forms;

use ModulesGarden\ggsmodule\Components\Form\Form;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\ggsmodule\Components\Dropdown\Dropdown;
use ModulesGarden\ggsmodule\Core\DataProviders\CrudProvider;
use ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\DynamicTabs\Providers\EditTabsProvider;

class EditTabsForm extends Form implements AdminAreaInterface, AjaxComponentInterface
{
    protected string $provider = EditTabsProvider::class;
    protected string $providerAction = CrudProvider::ACTION_UPDATE;

    public function loadHtml(): void
    {
        $this->builder->addField((new Dropdown())->setName("tabsNames")->setMultiple());
    }
}