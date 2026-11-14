<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\Graphs\Graphs;

use ModulesGarden\GGSModule\Components\Graph\Models\DataSet;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;

class SparklineGraphAreaInline extends \ModulesGarden\GGSModule\Components\Graph\InlineGraphArea implements AdminAreaInterface
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