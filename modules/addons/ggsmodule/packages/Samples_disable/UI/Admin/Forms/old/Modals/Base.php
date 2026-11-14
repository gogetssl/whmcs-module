<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\ComplexElements\Modals;

use ModulesGarden\GGSModule\Components\Alert\AlertInfo;
use ModulesGarden\GGSModule\Components\Modal\ModalBase;
use ModulesGarden\GGSModule\Components\TableSimple\TableSimple;
use ModulesGarden\GGSModule\Components\TabsWidget\TabsWidget;
use ModulesGarden\GGSModule\Components\Widget\Widget;
use WHMCS\Database\Capsule as DB;

class Base extends ModalBase
{
    public function loadHtml(): void
    {
        $productPricingTable = new TableSimple();
        $productPricingTable->setRecords(DB::table('tblclients')->select('firstname', 'lastname')->limit(20)->get()->toArray());

        $alert = new AlertInfo();
        $alert->setText('Hello!');

        $widget = new Widget();
        $widget->setTitle('XXX');
        $widget->setContent('esfefsef');

        $widgetx = new Widget();
        $widgetx->addElement($productPricingTable);

        $productPricingTab = new \ModulesGarden\GGSModule\Components\Tab\Tab();
        $productPricingTab->setTitle('Product Pricing Tab');
        $productPricingTab->addElement($alert);
        $productPricingTab->addElement($widget);
        $productPricingTab->addElement($widgetx);
        $productPricingTab->addElement($productPricingTable);

        $alert = new AlertInfo();
        $alert->setText('Hello!');

        $configOptionPricing = new \ModulesGarden\GGSModule\Components\Tab\Tab();
        $configOptionPricing->setTitle('Config Options Pricing');
        $configOptionPricing->addElement($alert);

        $tabs = new TabsWidget();
        $tabs->addTab($productPricingTab);
        $tabs->addTab($configOptionPricing);

        $this->addElement($tabs);

    }
}