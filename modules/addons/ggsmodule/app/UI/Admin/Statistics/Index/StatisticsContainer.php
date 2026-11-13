<?php

namespace ModulesGarden\ggsmodule\App\UI\Admin\Statistics\Index;

use ModulesGarden\ggsmodule\App\UI\Admin\Statistics\Index\Widgets\ExpiringCertificatesWidget;
use ModulesGarden\ggsmodule\App\UI\Admin\Statistics\Index\Widgets\InvoicesWidget;
use ModulesGarden\ggsmodule\App\UI\Admin\Statistics\Index\Widgets\OrdersByStatusWidget;
use ModulesGarden\ggsmodule\App\UI\Admin\Statistics\Index\Widgets\ProductIncomeWidget;
use ModulesGarden\ggsmodule\App\UI\Admin\Statistics\Index\Widgets\ResellersWidget;
use ModulesGarden\ggsmodule\App\UI\Admin\Statistics\Index\Widgets\RevenueByProviderWidget;
use ModulesGarden\ggsmodule\App\UI\Admin\Statistics\Index\Widgets\TotalIncomeWidget;
use ModulesGarden\ggsmodule\Components\Alert\AlertInfo;
use ModulesGarden\ggsmodule\Components\Container\Container;
use ModulesGarden\ggsmodule\Components\Grid\Grid;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;

class StatisticsContainer extends Container implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        if(!\ModulesGarden\ggsmodule\App\Libs\GeneralSettings::enabled('hideInfoMessages'))
        {
            $alert = new AlertInfo();
            $alert->setText($this->translate('statisticsInfo'));
            $this->addElement($alert);
        }

        $grid = new Grid();
        $grid->setRows(
            [
                [
                    [new TotalIncomeWidget(), 6],
                    [new ProductIncomeWidget(), 6]
                ],
                [
                    [new ExpiringCertificatesWidget(), 6],
                    [new OrdersByStatusWidget(), 6]
                ],
                [
                    [new RevenueByProviderWidget(), 6],
                    [new ResellersWidget(), 6]
                ],
                [
                    [new InvoicesWidget(), 12]
                ]
            ]
        );

        $this->addElement($grid);
    }
}