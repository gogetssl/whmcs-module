<?php

namespace ModulesGarden\GGSModule\App\UI\Admin\Statistics\Index\Graphs;

use ModulesGarden\GGSModule\App\UI\Admin\Reports\Index\DataTables\Shared\RecordsProvider;
use ModulesGarden\GGSModule\Components\Graph\GraphDoughnut;
use ModulesGarden\GGSModule\Components\Graph\Models\DataSet;
use ModulesGarden\GGSModule\Components\Graph\Series\SimpleSeries;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxComponentInterface;

class RevenueByProviderGraph extends GraphDoughnut implements AdminAreaInterface, AjaxComponentInterface
{
    public function loadData(): void
    {
        $this->options->chart->height = "380px";
        $records = [];
        foreach((new RecordsProvider())->getRecords(['fromDate' => date('Y-m-01 00:00:00', strtotime('-5 months')), 'toDate' => date('Y-m-t 23:59:59')]) as $record)
        {
            $records[$record['serviceId']] = $record;
        }

        $sums = [];
        foreach($records as $record)
        {
            $name        = $record['brand'] ?: 'Other';
            $sums[$name] = ($sums[$name] ?? 0) + $record['salesAmount'];
        }
        arsort($sums);

        $this->setLabels(array_keys($sums));
        foreach($sums as $sum)
        {
            $this->addSeries(new SimpleSeries(round($sum, 2)));
        }
    }
}
