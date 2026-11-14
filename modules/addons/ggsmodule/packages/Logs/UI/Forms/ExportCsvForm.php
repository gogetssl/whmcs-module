<?php

namespace ModulesGarden\GGSModule\Packages\Logs\UI\Forms;

use ModulesGarden\GGSModule\Components\DatePicker\DatePicker;
use ModulesGarden\GGSModule\Components\Dropdown\Dropdown;
use ModulesGarden\GGSModule\Components\Form\Form;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\GGSModule\Packages\Logs\UI\Providers\ExportProvider;

class ExportCsvForm extends Form implements AjaxComponentInterface, AdminAreaInterface
{
    protected string $provider = ExportProvider::class;
    protected string $providerAction = ExportProvider::ACTION_CREATE;

    public function loadHtml(): void
    {
        $this->builder->addField((new DatePicker())->setName('from')->addValidator('date'),true);
        $this->builder->addField((new DatePicker())->setName('to')->addValidator('date'),true);
        $this->builder->addField(
            (new Dropdown())
                ->setMultiple()
                ->setName('types')
                ->setPlaceholder($this->translate('allTypes')),
            true);
    }

}