<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\Graphs\Graphs;

use ModulesGarden\ggsmodule\Components\Graph\Models\DataSet;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;

class SparklineGraphLine extends \ModulesGarden\ggsmodule\Components\Graph\SparklineGraphLine implements AdminAreaInterface
{
    public function loadHtml():void
    {
        $this->setTitle("Dobry tytuł");
        $this->setSubTitle("Nie gorszy pod tytuł");
    }

    public function loadData(): void
    {
        $dataSet = new DataSet();
        $dataSet->setTitle('Data Set')
            ->setData([rand(0, 10), rand(0, 10), rand(0, 10), rand(0, 10), rand(0, 10), rand(0, 10)]);

        $this->addDataSet($dataSet);
    }
}