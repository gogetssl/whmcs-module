<?php

namespace ModulesGarden\ggsmodule\Packages\Logs\UI\Forms;

use ModulesGarden\ggsmodule\Components\DatePicker\DatePicker;
use ModulesGarden\ggsmodule\Components\Dropdown\Dropdown;
use ModulesGarden\ggsmodule\Components\Form\Form;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\ggsmodule\Packages\Logs\UI\Providers\ExportProvider;

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