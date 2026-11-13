<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\ElementsListComponent\ElementsLists;

use ModulesGarden\ggsmodule\Components\ElementsList\ElementsList as ElementsListComponent;
use ModulesGarden\ggsmodule\Components\Text\Text;
use ModulesGarden\ggsmodule\Core\Components\AbstractComponent;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\ggsmodule\Core\DataProviders\QueryDataProvider;
use ModulesGarden\ggsmodule\Core\WHMCS\Models\Client;

class ElementsList extends ElementsListComponent implements AdminAreaInterface, AjaxComponentInterface
{
    public function loadData(): void
    {
        $clients = Client::select('tblclients.id', 'tblclients.firstname', 'lastname', 'taxexempt', 'companyname');

        $dataProv = new QueryDataProvider($clients);
        $dataProv->setColumns([
            (new \ModulesGarden\ggsmodule\Core\DataProviders\Column('id'))->setSearchable(true),
            (new \ModulesGarden\ggsmodule\Core\DataProviders\Column('firstname'))->setSearchable(true),
        ]);
        $dataProv->setDefaultSorting('tblclients.id', 'DESC');
        $this->setDataProvider($dataProv);
        $this->setAjaxData(['rand' . rand(0, 100) => 1]);
    }

    protected function buildElement($record): AbstractComponent
    {
        return (new Text())->setText($record->firstname);
    }
}