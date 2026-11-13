<?php

namespace ModulesGarden\ggsmodule\Components\ElementsList;

use ModulesGarden\ggsmodule\Components\DataTable\DataTable;
use ModulesGarden\ggsmodule\Core\Components\AbstractComponent;

abstract class ElementsList extends DataTable
{
    public const COMPONENT = 'ElementsList';

    abstract protected function buildElement($record):AbstractComponent;

    protected function parseDataSetRecords(): void
    {
        foreach ($this->dataSet->getRecords() as $record)
        {
            $this->addElement($this->buildElement($record));
        }
    }
}