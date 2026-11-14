<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\KanbanBoard\Providers;

use ModulesGarden\GGSModule\Core\DataProviders\CrudProvider;

class BoardProvider extends CrudProvider
{
    public function update()
    {
        //print_r($this->formData);
        throw new \Exception('Not implemented');
    }
}