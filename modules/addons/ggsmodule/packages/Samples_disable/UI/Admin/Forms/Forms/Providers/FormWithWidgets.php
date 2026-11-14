<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\Home\Forms\Providers;

class FormWithWidgets extends \ModulesGarden\GGSModule\Core\DataProviders\CrudProvider
{
    public function create()
    {
        \ModulesGarden\GGSModule\Core\validator()->validate(\ModulesGarden\GGSModule\Core\Support\Facades\Request::getAll(), [
            'text'     => '',
            'dropdown' => 'required',
        ]);
        // TODO: Implement create() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }

    public function read()
    {
        // TODO: Implement read() method.
    }

    public function update()
    {
        // TODO: Implement update() method.
    }
}
