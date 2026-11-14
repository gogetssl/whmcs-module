<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\Home\SimpleForm\Pages;

use ModulesGarden\GGSModule\Components\TextShowHide\TextShowHide;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\Home\SimpleForm\Forms\SimpleAbstractForm;

class Container extends \ModulesGarden\GGSModule\Components\Container\Container implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new SimpleAbstractForm());
        $this->addElement(new TextShowHide());
    }

    protected function tabs()
    {
//        $tab = new Tab();
//        $tab->setTitle('XXXXX');
//        $tab->addElement(new DataTable());
//        //  $tab->setContent('QQWQWQWQWQW');
//
//        $tab2 = new Tab();
//        $tab2->setTitle('1212121212');
//        $tab2->setContent('QQWQWwwewweweweQWQWQW');
//
//        $tabs = new TabsWidget();
//        $tabs->addTab($tab);
//        $tabs->addTab($tab2);
//
//        return $tabs;
    }
}
