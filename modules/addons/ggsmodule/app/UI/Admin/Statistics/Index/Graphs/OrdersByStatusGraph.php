<?php

namespace ModulesGarden\ggsmodule\App\UI\Admin\Statistics\Index\Graphs;

use ModulesGarden\ggsmodule\App\Libs\Helpers;
use ModulesGarden\ggsmodule\App\UI\Admin\Reports\Index\DataTables\Shared\RecordsProvider;
use ModulesGarden\ggsmodule\Components\Graph\GraphDoughnut;
use ModulesGarden\ggsmodule\Components\Graph\Models\DataSet;
use ModulesGarden\ggsmodule\Components\Graph\Series\SimpleSeries;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AjaxComponentInterface;

class OrdersByStatusGraph extends GraphDoughnut implements AdminAreaInterface, AjaxComponentInterface
{
    public function loadData(): void
    {
        $this->options->chart->height = "380px";
        $records = [];
        foreach((new RecordsProvider())->getRecords([]) as $record)
        {
            $records[$record['serviceId']] = $record;
        }

        $counts = [];
        foreach($records as $record)
        {
            $status          = $record['status'] ?: 'Unknown';
            $counts[$status] = ($counts[$status] ?? 0) + 1;
        }
        arsort($counts);

        $this->setLabels(array_keys($counts));
        foreach($counts as $count)
        {
            $this->addSeries(new SimpleSeries($count));
        }
    }
}
