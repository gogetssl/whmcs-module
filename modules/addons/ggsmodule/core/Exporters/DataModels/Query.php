<?php

namespace ModulesGarden\ggsmodule\Core\Exporters\DataModels;

use ModulesGarden\ggsmodule\Core\Exporters\Source\DataModelInterface;

class Query extends Collection implements DataModelInterface
{
    public function __construct($query)
    {
        parent::__construct($query->get());
    }
}