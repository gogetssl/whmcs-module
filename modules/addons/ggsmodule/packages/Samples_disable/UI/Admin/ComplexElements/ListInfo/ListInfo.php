<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\ComplexElements\ListInfo;

use ModulesGarden\ggsmodule\Components\Badge\Badge;
use ModulesGarden\ggsmodule\Components\Badge\BadgeDanger;
use ModulesGarden\ggsmodule\Components\Container\Container;
use ModulesGarden\ggsmodule\Components\Grid\Grid;
use ModulesGarden\ggsmodule\Components\ListInfo\ListInfoItem;
use ModulesGarden\ggsmodule\Components\Widget\Widget;

class ListInfo extends Container
{
    public function loadHtml(): void
    {
        //Invoice summary
        $info = new \ModulesGarden\ggsmodule\Components\ListInfo\ListInfo();
        $info->addItem(new ListInfoItem('Invoice Paid Last Week', (new Badge())->setText(3)->setOutline()));
        $info->addItem(new ListInfoItem('Invoice Paid Last Month', (new Badge())->setText(5)->setOutline()));
        $info->addItem(new ListInfoItem('Invoice Paid Last Quarter', (new Badge())->setText(6)->setOutline()));
        $info->addItem(new ListInfoItem('Invoice Paid Year', (new Badge())->setText(1221)->setOutline()));
        $info->addItem(new ListInfoItem('Unpaid Invoices', (new BadgeDanger())->setText(3)->setOutline()));

        $invoicesSummary = new Widget();
        $invoicesSummary->setTitle('Invoice Summary');
        $invoicesSummary->addElement($info);

        //Earning Summary
        $info = new \ModulesGarden\ggsmodule\Components\ListInfo\ListInfo();
        $info->addItem(new ListInfoItem('Last Week', (new Badge())->setText("$6.41 USD")->setOutline()));
        $info->addItem(new ListInfoItem('Last Month', (new Badge())->setText("$42.79 USD")->setOutline()));
        $info->addItem(new ListInfoItem('Last Quarter', (new Badge())->setText("$88.50 USD")->setOutline()));
        $info->addItem(new ListInfoItem('Last Year', (new Badge())->setText("88.50 USD")->setOutline()));

        $earningSummary = new Widget();
        $earningSummary->setTitle('Earnings Summary');
        $earningSummary->addElement($info);

        //Grid
        $grid = new Grid();
        $grid->setRows([
            [[$invoicesSummary, 4], [$earningSummary, 4]],
        ]);

        $this->addElement($grid);
    }
}