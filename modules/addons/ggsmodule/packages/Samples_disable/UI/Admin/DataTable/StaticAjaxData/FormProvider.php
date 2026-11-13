<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\DataTable\StaticAjaxData;

use ModulesGarden\ggsmodule\Core\Components\Actions\ModalClose;
use ModulesGarden\ggsmodule\Core\Components\Actions\Reload;
use ModulesGarden\ggsmodule\Core\Components\Response\Response;
use ModulesGarden\ggsmodule\Core\DataProviders\CrudProvider;

class FormProvider extends CrudProvider
{
    public function create()
    {
        return (new Response())
            ->setActions([
                (new Reload((new DataTable())))->withParams([
                    'recordToAdd' => rand(0, 100)
                ]), new ModalClose()]);
    }
}