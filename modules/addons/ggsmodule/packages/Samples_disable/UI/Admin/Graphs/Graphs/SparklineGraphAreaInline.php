<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\Graphs\Graphs;

use ModulesGarden\ggsmodule\Components\Graph\Models\DataSet;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;

class SparklineGraphAreaInline extends \ModulesGarden\ggsmodule\Components\Graph\InlineGraphArea implements AdminAreaInterface
{
    public function loadHtml():void
    {
    }

    public function loadData(): void
    {
        $dataSet = new DataSet();
        $dataSet->setTitle('Data Set')
            ->setData([rand(0, 10), rand(0, 10), rand(0, 10), rand(0, 10), rand(0, 10), rand(0, 10), rand(0, 10), rand(0, 10), rand(0, 10)]);

        $this->addDataSet($dataSet);
    }
}