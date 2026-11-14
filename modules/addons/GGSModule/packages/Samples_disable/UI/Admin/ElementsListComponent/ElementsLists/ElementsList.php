<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\ElementsListComponent\ElementsLists;

use ModulesGarden\GGSModule\Components\ElementsList\ElementsList as ElementsListComponent;
use ModulesGarden\GGSModule\Components\Text\Text;
use ModulesGarden\GGSModule\Core\Components\AbstractComponent;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\GGSModule\Core\DataProviders\QueryDataProvider;
use ModulesGarden\GGSModule\Core\WHMCS\Models\Client;

class ElementsList extends ElementsListComponent implements AdminAreaInterface, AjaxComponentInterface
{
    public function loadData(): void
    {
        $clients = Client::select('tblclients.id', 'tblclients.firstname', 'lastname', 'taxexempt', 'companyname');

        $dataProv = new QueryDataProvider($clients);
        $dataProv->setColumns([
            (new \ModulesGarden\GGSModule\Core\DataProviders\Column('id'))->setSearchable(true),
            (new \ModulesGarden\GGSModule\Core\DataProviders\Column('firstname'))->setSearchable(true),
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