<?php

namespace ModulesGarden\GGSModule\Fragments\ConfigurableHintBox\UI\Forms;

use ModulesGarden\GGSModule\Components\Form\Form;
use ModulesGarden\GGSModule\Components\HiddenField\HiddenField;
use ModulesGarden\GGSModule\Components\Switcher\Switcher;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\GGSModule\Core\DataProviders\CrudProvider;
use ModulesGarden\GGSModule\Fragments\ConfigurableHintBox\UI\Providers\ConfigurationProvider;

class EditConfigurationForm extends Form implements AdminAreaInterface, AjaxComponentInterface
{
    protected string $provider = ConfigurationProvider::class;
    protected string $providerAction = CrudProvider::ACTION_UPDATE;

    public function loadHtml(): void
    {
        $this->builder->createField(Switcher::class, 'hideHintBox', true);
        $this->builder->createField(HiddenField::class, 'widgetId');
    }
}