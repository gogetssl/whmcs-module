<?php

namespace ModulesGarden\GGSModule\Core\Exporters\DataModels;

use ModulesGarden\GGSModule\Core\Exporters\Source\DataModelInterface;

class Query extends Collection implements DataModelInterface
{
    public function __construct($query)
    {
        parent::__construct($query->get());
    }
}