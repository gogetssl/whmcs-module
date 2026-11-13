<?php

namespace ModulesGarden\ggsmodule\App\UI\Admin\Reports\Index\DataTables\ProfitLoss\Widgets;

use ModulesGarden\ggsmodule\App\Libs\Helpers;
use ModulesGarden\ggsmodule\App\UI\Admin\Reports\Index\DataTables\ProfitLoss\ArrayDataProvider\DataProvider;
use ModulesGarden\ggsmodule\App\UI\Admin\Reports\Index\DataTables\Shared\RecordsProvider;
use ModulesGarden\ggsmodule\Components\Alert\Alert;
use ModulesGarden\ggsmodule\Core\Components\Enums\Color;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\ggsmodule\Core\Support\Facades\Request;
use ModulesGarden\ggsmodule\Core\WHMCS\Models\Currency;

class Header extends Alert implements AdminAreaInterface, AjaxComponentInterface
{
    public function __construct()
    {
        parent::__construct();

        $this->setId('profitLossHeader');

        $ajaxData            = Request::get('ajaxData');//custom filter values
        $filters['fromDate'] = $ajaxData['fromDate'] ?: '';
        $filters['toDate']   = $ajaxData['toDate'] ?: '';

        $recordsProvider = new RecordsProvider();
        $rows            = $recordsProvider->getRecords($filters);

        $profit           = 0;
        $certificateCount = 0;

        foreach($rows as $row)
        {

            $profit += $row['grossProfit'];
            $certificateCount++;
        }

        $class = ($profit > 0) ? 'green' : 'red';
        $profit       = Helpers::formatDefaultCurrency($profit);

        $content = <<<CONTENT
                    <p class="report-header">{$this->translate('totalGrossProfit')} <span class="{$class}">$profit </span></p>
                    <p class="report-header rh-second">{$this->translate('certificateCount')} <span class="green">$certificateCount </span></p>
CONTENT;


        $this->setType(Color::SECONDARY);
        $this->setText($content);
    }
}