<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\ElementsListComponent\ElementsLists;

use ModulesGarden\GGSModule\Components\Badge\BadgeDanger;
use ModulesGarden\GGSModule\Components\Badge\BadgeInfo;
use ModulesGarden\GGSModule\Components\Badge\BadgeSuccess;
use ModulesGarden\GGSModule\Components\Badge\BadgeWarning;
use ModulesGarden\GGSModule\Components\Container\Container;
use ModulesGarden\GGSModule\Components\ElementsList\ElementsList as ElementsListComponent;
use ModulesGarden\GGSModule\Components\Image\Image;
use ModulesGarden\GGSModule\Components\ListInfo\ListInfo;
use ModulesGarden\GGSModule\Components\ListInfo\ListInfoItem;
use ModulesGarden\GGSModule\Components\PageViewWidget\PageViewWidget;
use ModulesGarden\GGSModule\Components\Row\Row;
use ModulesGarden\GGSModule\Components\TableSimple\Record\Record;
use ModulesGarden\GGSModule\Components\TableSimple\TableSimple;
use ModulesGarden\GGSModule\Components\Text\Text;
use ModulesGarden\GGSModule\Components\Text\TextBold;
use ModulesGarden\GGSModule\Components\Toolbar\Toolbar;
use ModulesGarden\GGSModule\Core\Components\AbstractComponent;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\GGSModule\Core\DataProviders\QueryDataProvider;
use ModulesGarden\GGSModule\Core\WHMCS\Models\Client;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\ComplexElements\Labels\Status;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\ElementsListComponent\Buttons\ButtonDelete;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\ElementsListComponent\Buttons\ButtonDomain;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\ElementsListComponent\Buttons\ButtonEdit;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\ElementsListComponent\Buttons\ButtonSettings;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\ElementsListComponent\Buttons\ButtonTime;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\ElementsListComponent\Components\WordPressPageViewWidget;

class WordPressSampleList extends ElementsListComponent implements AdminAreaInterface, AjaxComponentInterface
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
        $pageViewWidget = new PageViewWidget();
        $pageViewWidget->setTitle($record->firstname);

        $pageViewWidget->setImage($this->getImage($record));
        $pageViewWidget->setDetails($this->getDetails($record));
        $pageViewWidget->setButtonsContainer($this->getButtonsContainer($record));

        return $pageViewWidget;
    }

    protected function getImage($record): Image
    {
        $images = [
            "../modules/addons/GGSModule/resources/assets//img/logo.png",
            "templates/blend/images/logo.png",
        ];

        return (new Image())->setUrl($images[rand(0,1)]);
    }

    protected function getDetails($record): AbstractComponent
    {
        $table = new TableSimple();
        $table->addRecord(new Record([
            (new TextBold())->setText('Status'),
            "Terminated",
        ]));
        $table->addRecord(new Record([
            (new TextBold())->setText("Hostname"),
            'myestdomain.com',
        ]));
        $table->addRecord(new Record([
            (new TextBold())->setText('Memory'),
            '2GB',
        ]));
        $table->addRecord(new Record([
            (new TextBold())->setText('Backups'),
            'Enabled',
        ]));

        return $table;
    }

    protected function getButtonsContainer($record): AbstractComponent
    {
        $container = new Container();

        $bar = new Toolbar();
        $bar->addElement((new ButtonDelete()));
        $bar->addElement((new ButtonDomain()));
        $bar->addElement((new ButtonEdit()));
        $bar->addElement((new ButtonSettings()));
        $bar->addElement((new ButtonTime()));

        $container->addElement($bar);
        $container->addElement(new Row());

        return $container;
    }
}