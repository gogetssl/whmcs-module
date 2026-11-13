<?php

namespace ModulesGarden\ggsmodule\App\UI\Admin\Import\Index\Forms;

use ModulesGarden\ggsmodule\App\UI\Admin\Import\Index\Providers\ImportProvider;
use ModulesGarden\ggsmodule\App\UI\Admin\Reports\Index\DataTables\ProfitLoss\Providers\FilterProvider;
use ModulesGarden\ggsmodule\Components\Button\ButtonPrimary;
use ModulesGarden\ggsmodule\Components\Button\ButtonSuccess;
use ModulesGarden\ggsmodule\Components\DatePicker\DatePicker;
use ModulesGarden\ggsmodule\Components\Dropdown\Dropdown;
use ModulesGarden\ggsmodule\Components\Form\Builder\BuilderCreator;
use ModulesGarden\ggsmodule\Components\Form\Form;
use ModulesGarden\ggsmodule\Components\FormInputText\FormInputText;
use ModulesGarden\ggsmodule\Components\HiddenField\HiddenField;
use ModulesGarden\ggsmodule\Components\Switcher\Switcher;
use ModulesGarden\ggsmodule\Components\Toolbar\Toolbar;
use ModulesGarden\ggsmodule\Core\Components\Actions\FormSubmit;
use ModulesGarden\ggsmodule\Core\Components\Actions\ReloadById;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AjaxComponentInterface;


class ImportForm extends Form implements AdminAreaInterface, AjaxComponentInterface
{
    public function __construct()
    {
        parent::__construct();

        $this->provider       = ImportProvider::class;
        $this->providerAction = ImportProvider::ACTION_CREATE;
    }

    public function loadHtml(): void
    {
        $this->builder = BuilderCreator::twoColumns($this);
        $this->setId('ImportForm');
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
                ->setValue('single')
        );

        $this->builder->addField(
            (new FormInputText())
                ->setTitle($this->translate('remoteOrderId'))
                ->setName('remoteOrderId')
                ->required()
        );

        $this->builder->addField(
            (new Dropdown())
                ->setTitle($this->translate('clientId'))
                ->setName('clientId')
                ->required()
        );

        $this->builder->addField(
            (new FormInputText())
                ->setTitle($this->translate('serviceId'))
                ->setName('serviceId')
        );

        $this->builder->addField(
            (new Dropdown())
                ->setTitle($this->translate('payMethod'))
                ->setName('payMethod')
                ->required()
        );

        $this->builder->addField(
            (new Switcher())
                ->setTitle($this->translate('generateInvoice'))
                ->setName('generateInvoice')
                ->addClass('switcher-revert')
        );

        $this->addElement($toolbar);
    }
}