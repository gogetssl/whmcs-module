<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\Home\Forms\Providers;

class FormWithWidgets extends \ModulesGarden\ggsmodule\Core\DataProviders\CrudProvider
{
    public function create()
    {
        \ModulesGarden\ggsmodule\Core\validator()->validate(\ModulesGarden\ggsmodule\Core\Support\Facades\Request::getAll(), [
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
