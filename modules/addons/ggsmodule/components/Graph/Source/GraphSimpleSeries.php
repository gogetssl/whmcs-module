<?php

namespace ModulesGarden\ggsmodule\Components\Graph\Source;

use ModulesGarden\ggsmodule\Components\Graph\Models\DataSet;
use ModulesGarden\ggsmodule\Components\Graph\Options\LabelsOptions;
use ModulesGarden\ggsmodule\Components\Graph\Series\SimpleSeries;

abstract class GraphSimpleSeries extends BaseGraph
{
    public function addDataSet(DataSet $dataSet)
    {
        foreach ($dataSet->getData() as $element)
        {
            $this->addSeries(new SimpleSeries($element));
        }

        return $this;
    }

    public function addSeries(SimpleSeries $series):self
    {
        $this->options->addSeries($series);

        return $this;
    }

    public function setLabels(array $labels = []):self
    {
        $this->options->labels = new LabelsOptions($labels);

        return $this;
    }
}