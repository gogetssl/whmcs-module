<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\ElementsListComponent\ElementsLists;

use ModulesGarden\ggsmodule\Components\Badge\BadgeDanger;
use ModulesGarden\ggsmodule\Components\Badge\BadgeInfo;
use ModulesGarden\ggsmodule\Components\Badge\BadgeSuccess;
use ModulesGarden\ggsmodule\Components\Badge\BadgeWarning;
use ModulesGarden\ggsmodule\Components\Container\Container;
use ModulesGarden\ggsmodule\Components\ElementsList\ElementsList as ElementsListComponent;
use ModulesGarden\ggsmodule\Components\Image\Image;
use ModulesGarden\ggsmodule\Components\ListInfo\ListInfo;
use ModulesGarden\ggsmodule\Components\ListInfo\ListInfoItem;
use ModulesGarden\ggsmodule\Components\PageViewWidget\PageViewWidget;
use ModulesGarden\ggsmodule\Components\Row\Row;
use ModulesGarden\ggsmodule\Components\TableSimple\Record\Record;
use ModulesGarden\ggsmodule\Components\TableSimple\TableSimple;
use ModulesGarden\ggsmodule\Components\Text\Text;
use ModulesGarden\ggsmodule\Components\Text\TextBold;
use ModulesGarden\ggsmodule\Components\Toolbar\Toolbar;
use ModulesGarden\ggsmodule\Core\Components\AbstractComponent;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\ggsmodule\Core\DataProviders\QueryDataProvider;
use ModulesGarden\ggsmodule\Core\WHMCS\Models\Client;
use ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\ComplexElements\Labels\Status;
use ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\ElementsListComponent\Buttons\ButtonDelete;
use ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\ElementsListComponent\Buttons\ButtonDomain;
use ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\ElementsListComponent\Buttons\ButtonEdit;
use ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\ElementsListComponent\Buttons\ButtonSettings;
use ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\ElementsListComponent\Buttons\ButtonTime;
use ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\ElementsListComponent\Components\WordPressPageViewWidget;

class WordPressSampleList extends ElementsListComponent implements AdminAreaInterface, AjaxComponentInterface
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
            "../modules/addons/ggsmodule/resources/assets//img/logo.png",
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