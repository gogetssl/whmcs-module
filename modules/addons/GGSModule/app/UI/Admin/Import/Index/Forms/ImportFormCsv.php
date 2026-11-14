<?php

namespace ModulesGarden\GGSModule\App\UI\Admin\Import\Index\Forms;

use ModulesGarden\GGSModule\App\UI\Admin\Import\Index\Providers\ImportProvider;
use ModulesGarden\GGSModule\App\UI\Admin\Reports\Index\DataTables\ProfitLoss\Providers\FilterProvider;
use ModulesGarden\GGSModule\Components\Button\ButtonPrimary;
use ModulesGarden\GGSModule\Components\Button\ButtonSuccess;
use ModulesGarden\GGSModule\Components\DatePicker\DatePicker;
use ModulesGarden\GGSModule\Components\Dropdown\Dropdown;
use ModulesGarden\GGSModule\Components\Form\Builder\BuilderCreator;
use ModulesGarden\GGSModule\Components\Form\Form;
use ModulesGarden\GGSModule\Components\FormInputText\FormInputText;
use ModulesGarden\GGSModule\Components\HiddenField\HiddenField;
use ModulesGarden\GGSModule\Components\Switcher\Switcher;
use ModulesGarden\GGSModule\Components\Toolbar\Toolbar;
use ModulesGarden\GGSModule\Components\UploadField\UploadField;
use ModulesGarden\GGSModule\Core\Components\Actions\FormSubmit;
use ModulesGarden\GGSModule\Core\Components\Actions\ReloadById;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxComponentInterface;


class ImportFormCsv extends Form implements AdminAreaInterface, AjaxComponentInterface
{
    public function __construct()
    {
        parent::__construct();

        $this->provider       = ImportProvider::class;
        $this->providerAction = ImportProvider::ACTION_CREATE;
    }

    public function loadHtml(): void
    {
        $this->builder = BuilderCreator::oneColumn($this);
        $this->setId('ImportFormCsv');
        $toolbar = new Toolbar();

        $toolbar->addElement(
            (new ButtonSuccess())
                ->setTitle($this->translate('import'))
                ->setIcon('import')
                ->onClick(
                    (new FormSubmit($this))
                )
        );

        $this->builder->addField(
            (new HiddenField())
                ->setName('mode')
                ->setValue('csv')
                ->required()
        );

        $this->builder->addField(
            (new UploadField())
                ->setName('csv')
                ->setAllowedFileTypes(['text/csv'])
                //->required()
        );

        $this->builder->addField(
            (new Switcher())
                ->setName('generateInvoice')
                ->addClass('switcher-revert')
        );

        $this->addElement($toolbar);
    }
}