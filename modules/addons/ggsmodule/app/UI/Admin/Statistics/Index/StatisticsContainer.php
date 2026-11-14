<?php

namespace ModulesGarden\GGSModule\App\UI\Admin\Statistics\Index;

use ModulesGarden\GGSModule\App\UI\Admin\Statistics\Index\Widgets\ExpiringCertificatesWidget;
use ModulesGarden\GGSModule\App\UI\Admin\Statistics\Index\Widgets\InvoicesWidget;
use ModulesGarden\GGSModule\App\UI\Admin\Statistics\Index\Widgets\OrdersByStatusWidget;
use ModulesGarden\GGSModule\App\UI\Admin\Statistics\Index\Widgets\ProductIncomeWidget;
use ModulesGarden\GGSModule\App\UI\Admin\Statistics\Index\Widgets\ResellersWidget;
use ModulesGarden\GGSModule\App\UI\Admin\Statistics\Index\Widgets\RevenueByProviderWidget;
use ModulesGarden\GGSModule\App\UI\Admin\Statistics\Index\Widgets\TotalIncomeWidget;
use ModulesGarden\GGSModule\Components\Alert\AlertInfo;
use ModulesGarden\GGSModule\Components\Container\Container;
use ModulesGarden\GGSModule\Components\Grid\Grid;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;

class StatisticsContainer extends Container implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        if(!\ModulesGarden\GGSModule\App\Libs\GeneralSettings::enabled('hideInfoMessages'))
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