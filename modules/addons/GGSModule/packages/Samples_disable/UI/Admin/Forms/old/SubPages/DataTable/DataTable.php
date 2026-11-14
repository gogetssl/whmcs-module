<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\ComplexElements\SubPages\DataTable;

use ModulesGarden\GGSModule\Components\CopyPasswordInline\CopyPasswordInline;
use ModulesGarden\GGSModule\Components\DataTable\Column;
use ModulesGarden\GGSModule\Components\DropdownMenu\DropdownMenu;
use ModulesGarden\GGSModule\Components\DropdownMenuItem\DropdownMenuItem;
use ModulesGarden\GGSModule\Components\FormLabel\FormLabel;
use ModulesGarden\GGSModule\Components\Label\LabelSuccess;
use ModulesGarden\GGSModule\Components\ListSimple\ListSimple;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\GGSModule\Core\DataProviders\QueryDataProvider;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\DataTable\Buttons\UserCreate;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\DataTable\Buttons\UserDelete;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\DataTable\Buttons\UserEdit;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\DataTable\Switchers\TaxExempt;
use WHMCS\User\Client;

class DataTable extends \ModulesGarden\GGSModule\Components\DataTable\DataTable implements AdminAreaInterface, AjaxComponentInterface
{
    public function loadHtml(): void
    {
        $this->setTitle('Clients');

        $this
            ->addColumn((new Column('id'))
                ->setSortable()
                ->setSearchable(true, Column::TYPE_INT))
            ->addColumn((new Column('firstname'))
                ->setSortable(true)
                ->setSearchable(true))
            ->addColumn((new Column('lastname'))
                ->setSortable(true)
                ->setSearchable(true))
            ->addColumn((new Column('taxexempt')));

        $this->addMassActionButton(new UserEdit());
        $this->addMassActionButton(new UserDelete());


        $this->addActionButton(new  UserEdit());
        $this->addActionButton(new  UserDelete());
        $this->addToToolbar(new UserCreate());

        //Burger
        $add = new DropdownMenuItem();
        $add->setIcon('pencil');

        $dropdown = new DropdownMenu();
        $dropdown->addItem($add);

        $this->addToToolbar($dropdown);
    }

    public function loadData(): void
    {
        $clients  = Client::select('id', 'firstname', 'lastname', 'taxexempt', 'companyname');
        $dataProv = new QueryDataProvider($clients);
        $dataProv->setDefaultSorting('id', 'DESC');
        $this->setDataProvider($dataProv);
    }


    protected function parseDataSetRecords(): void
    {
        $this->dataSet->setFieldModifier('taxexempt', function($fieldName, $row, $fieldValue) {
            $label = new FormLabel();
            $label->addElement((new TaxExempt('XXX'))->setValue($fieldValue));

            return $label;
        });


        $this->dataSet->setFieldModifier('lastname', function($fieldName, $row, $fieldValue) {
            return (new CopyPasswordInline())->setText($fieldValue);
        });

        $this->dataSet->setFieldModifier('firstname', function($fieldName, $row, $fieldValue) {
            $container = new ListSimple();
            $container->addItem((new LabelSuccess())->setText($fieldValue)->displayAsStatusLabel());
            $container->addItem((new LabelSuccess())->setText($row['companyname'])->displayAsStatusLabel());
            return $container;
        });


        $this->dataSet->modifyRecords();
    }
}
