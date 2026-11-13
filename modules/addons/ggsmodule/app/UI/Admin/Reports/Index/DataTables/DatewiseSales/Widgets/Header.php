<?php

namespace ModulesGarden\ggsmodule\App\UI\Admin\Reports\Index\DataTables\DatewiseSales\Widgets;

use ModulesGarden\ggsmodule\App\Libs\Helpers;
use ModulesGarden\ggsmodule\App\UI\Admin\Reports\Index\DataTables\DatewiseSales\ArrayDataProvider\DataProvider;
use ModulesGarden\ggsmodule\App\UI\Admin\Reports\Index\DataTables\Shared\RecordsProvider;
use ModulesGarden\ggsmodule\Components\Alert\Alert;
use ModulesGarden\ggsmodule\Core\Components\Enums\Color;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\ggsmodule\Core\Support\Facades\Request;
use ModulesGarden\ggsmodule\Core\WHMCS\Models\Currency;


class Header extends Alert implements AjaxComponentInterface, AdminAreaInterface
{
    public function __construct()
    {
        parent::__construct();

        $this->setId('DatewiseSalesHeader');

        $ajaxData            = Request::get('ajaxData');//custom filter values
        $filters['fromDate'] = $ajaxData['fromDate'] ?: '';
        $filters['toDate']   = $ajaxData['toDate'] ?: '';

        $recordsProvider = new RecordsProvider();
        $rows            = $recordsProvider->getRecords($filters);

        $paid    = 0;
        $unpaid  = 0;
        $overdue = 0;

        foreach($rows as $row)
        {
            if($row['paymentStatus'] == 'Paid')
            {
                $paid += $row['salesAmount'];
            }
            if($row['paymentStatus'] == 'Unpaid')
            {
                $unpaid += $row['salesAmount'];
            }
            if($row['paymentStatus'] == 'Overdue')
            {
                $overdue += $row['salesAmount'];
            }
        }

        $paid    = Helpers::formatDefaultCurrency($paid);
        $unpaid  = Helpers::formatDefaultCurrency($unpaid);
        $overdue = Helpers::formatDefaultCurrency($overdue);

        $content = <<<CONTENT
                    <p class="report-header">{$this->translate('paid')} <span class="green">$paid </span>{$this->translate('unpaid')} <span class="red">$unpaid </span>{$this->translate('overdue')} <span class="yellow">$overdue</span></p>
CONTENT;

        $this->setType(Color::SECONDARY);
        $this->setText($content);
    }
}