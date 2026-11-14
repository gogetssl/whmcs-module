<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\Graphs\Graphs;

use ModulesGarden\GGSModule\Components\Form\AbstractForm;
use ModulesGarden\GGSModule\Components\Graph\Models\DataSet;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\Graphs\Forms\Filters;


class GraphBar extends \ModulesGarden\GGSModule\Components\Graph\GraphBar implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        parent::loadHtml();
        $this->setTitle('Graph Bar');
    }

    public function loadData(): void
    {
        $multiple = (int)\ModulesGarden\GGSModule\Core\Support\Facades\Request::get('multiple', 1);

        $labels = ['day 1', 'day 2', 'day 3']; //labels on the bottom
        $this->setLabels($labels);

        //Data Set 1
        $dataSet1 = new DataSet();
        $dataSet1->setTitle('Data Set 1')
            ->setData([1 * $multiple, 5 * $multiple, 9 * $multiple]);

        $this->addDataSet($dataSet1);

        //Data Set 2
        $dataSet2 = new DataSet();
        $dataSet2->setTitle('Data Set 2')
            ->setData([8, 7, 4]);

        $this->addDataSet($dataSet2);

        //Data Set 3
        $dataSet3 = new DataSet();
        $dataSet3->setTitle('Data Set 3')
            ->setData([8, 12, 6]);

        $this->addDataSet($dataSet3);
    }

    protected function defineEditOption(): ?AbstractForm
    {
        return new Filters();
    }
}
