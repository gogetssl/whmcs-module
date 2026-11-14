<?php

namespace ModulesGarden\GGSModule\App\UI\Admin\Reports\Index\DataTables\ProfitLoss\Forms;

use ModulesGarden\GGSModule\App\UI\Admin\Reports\Index\DataTables\ProfitLoss\Providers\FilterProvider;
use ModulesGarden\GGSModule\Components\Button\ButtonPrimary;
use ModulesGarden\GGSModule\Components\Button\ButtonSuccess;
use ModulesGarden\GGSModule\Components\DatePicker\DatePicker;
use ModulesGarden\GGSModule\Components\Dropdown\Dropdown;
use ModulesGarden\GGSModule\Components\Form\Builder\BuilderCreator;
use ModulesGarden\GGSModule\Components\Form\Form;
use ModulesGarden\GGSModule\Components\HiddenField\HiddenField;
use ModulesGarden\GGSModule\Components\Toolbar\Toolbar;
use ModulesGarden\GGSModule\Core\Components\Actions\ReloadById;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxComponentInterface;


class FilterForm extends Form implements AdminAreaInterface, AjaxComponentInterface
{
    public function __construct()
    {
        parent::__construct();

        $this->provider       = FilterProvider::class;
        $this->providerAction = FilterProvider::ACTION_UPDATE;
    }

    public function loadHtml(): void
    {
        $this->builder = BuilderCreator::twoColumns($this);
        $this->setId('profitLossFilterForm');
        $toolbar = new Toolbar();

        $toolbar->addElement(
            (new ButtonSuccess())
                ->setTitle($this->translate('search'))
                ->setIcon('magnify')
                ->onClick(
                    (new ReloadById('profitLossDataTable'))
                        ->withDataFromFormById($this->getId())
                )
                ->onClick(
                    (new ReloadById('profitLossHeader'))
                        ->withDataFromFormById($this->getId())
                )
        );

        $fromDateField = new DatePicker();
        $fromDateField->setTitle($this->translate('fromDate'));
        $fromDateField->setName('fromDate');
        $this->builder->addField($fromDateField);

        $toDateField = new DatePicker();
        $toDateField->setTitle($this->translate('toDate'));
        $toDateField->setName('toDate');
        $this->builder->addField($toDateField);

        $this->addElement($toolbar);
    }
}