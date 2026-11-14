<?php

namespace ModulesGarden\GGSModule\App\UI\Admin\Products\Index\DataTables\Products\Forms;


use ModulesGarden\GGSModule\App\Libs\Helpers;
use ModulesGarden\GGSModule\App\UI\Admin\Products\Index\DataTables\Products\Providers\ImportProvider;
use ModulesGarden\GGSModule\Components\Alert\Alert;
use ModulesGarden\GGSModule\Components\Alert\AlertInfo;
use ModulesGarden\GGSModule\Components\Alert\AlertWarning;
use ModulesGarden\GGSModule\Components\Container\Container;
use ModulesGarden\GGSModule\Components\Dropdown\Dropdown;
use ModulesGarden\GGSModule\Components\Form\Builder\BuilderCreator;
use ModulesGarden\GGSModule\Components\Form\Form;
use ModulesGarden\GGSModule\Components\FormInputText\FormInputText;
use ModulesGarden\GGSModule\Components\Grid\Grid;
use ModulesGarden\GGSModule\Components\HiddenField\HiddenField;
use ModulesGarden\GGSModule\Components\Number\Number;
use ModulesGarden\GGSModule\Components\RadioButton\RadioButton;
use ModulesGarden\GGSModule\Components\Switcher\Switcher;
use ModulesGarden\GGSModule\Components\Tagger\Tagger;
use ModulesGarden\GGSModule\Components\Text\Text;
use ModulesGarden\GGSModule\Core\Components\Actions\Reload;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\GGSModule\Core\Support\Facades\Request;


class ImportForm extends Form implements AdminAreaInterface, AjaxComponentInterface
{
    public function __construct()
    {
        parent::__construct();

        $this->provider                  = ImportProvider::class;
        $this->providerAction            = ImportProvider::ACTION_CREATE;
        $this->providerActionsToValidate = ['create', 'update', 'delete'];
    }

    public function loadHtml(): void
    {
        $ajaxData = Request::get('ajaxData');
        $formData = Request::get('formData');
        $mode     = 'individual';

        if(isset($ajaxData['reloadedBy']) && $ajaxData['reloadedBy'] == 'pricingTypePercent')
        {
            $productGroupMode = ($formData['productGroup'] == 'new') ? "new" : "existing";
            $mode             = ((bool)$formData['pricingTypePercent']) ? "percent" : "individual";
        }
        elseif(isset($ajaxData['reloadedBy']) && $ajaxData['reloadedBy'] == 'pricingTypeIndividual')
        {
            $productGroupMode = ($formData['productGroup'] == 'new') ? "new" : "existing";
            $mode             = ((bool)$formData['pricingTypeIndividual']) ? "individual" : "percent";
        }
        elseif(isset($ajaxData['reloadedBy']) && $ajaxData['reloadedBy'] == 'productGroup')
        {
            $productGroupMode = ($formData['productGroup'] == 'new') ? "new" : "existing";
            $mode             = ((bool)$formData['pricingTypeIndividual']) ? "individual" : "percent";
        }

        $this->builder = BuilderCreator::oneColumn($this);

        $this->setId('productImportForm');

        $grid        = new Grid();
        $leftColumn  = new Container();
        $rightColumn = new Container();

        $grid->setRows([
                           [
                               [$leftColumn, 6],
                               [$rightColumn, 6]
                           ]
                       ]);

        $this->builder->addElement($grid);

        $pricingTypeIndividual = (new Switcher())
            ->setName('pricingTypeIndividual')
            ->addClass('switcher-revert')
            ->setId('pricingTypeIndividual')
            ->setDefaultValue('1')
            ->onChange((new Reload($this)));

        $pricingTypePercent = (new Switcher())
            ->setName('pricingTypePercent')
            ->addClass('switcher-revert')
            ->setId('pricingTypePercent')
            ->setDefaultValue('')
            ->onChange((new Reload($this)));

        //$description = (new AlertInfo())->setText($this->translate('description'))->setId('product-import-form-alert');

        $this->builder->addFieldInContainer($leftColumn, $pricingTypeIndividual);
        $this->builder->addFieldInContainer($leftColumn, $pricingTypePercent);
        //$leftColumn->addElement($description);

        $productGroupField = new Dropdown();
        $productGroupField->setName('productGroup');
        $productGroupField->required();
        $productGroupField->setDefaultValueAsFirstOption();
        $productGroupField->onChange((new Reload($this)));
        $this->builder->addFieldInContainer($rightColumn, $productGroupField);

        if($productGroupMode == 'new')
        {
            $productGroupNameField = new FormInputText();
            $productGroupNameField->setName('productGroupName');
            $productGroupNameField->required();
            $this->builder->addFieldInContainer($rightColumn, $productGroupNameField);
        }


        /*
                $currencyField = new Dropdown();
                $currencyField->setName('currency');
                $currencyField->required();
                $this->builder->addFieldInContainer($rightColumn, $currencyField);
        */

        if(!Helpers::getCurrencyIdByCode('USD')) //If USD not defined
        {
            $this->builder->addFieldInContainer(
                $rightColumn,
                (new FormInputText())
                    ->setName('rate')
                    ->required()
            );

            $rightColumn->addElement(
                (new AlertInfo())
                    ->setText($this->translate('info', [':defaultCurrency' => Helpers::getDefaultCurrencyCode()]))
                    ->setId('financial-settings-form-info')
            );
        }

        if($mode == 'percent')
        {
            $profitMarginField = new Number();
            $profitMarginField->setDefaultValue(1);
            $profitMarginField->setMin(0);
            $profitMarginField->setMax(1000);
            $profitMarginField->setName('profitMargin');
            $profitMarginField->required();
            $profitMarginField->numeric()->between(0, 1000);
            $this->builder->addFieldInContainer($rightColumn, $profitMarginField, true);
        }

        $idField = new HiddenField();
        $idField->setName('id');
        $this->builder->addFieldInContainer($rightColumn, $idField);
    }
}