<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\DataTable\StaticAjaxData;

use ModulesGarden\GGSModule\Core\Components\Actions\ModalClose;
use ModulesGarden\GGSModule\Core\Components\Actions\Reload;
use ModulesGarden\GGSModule\Core\Components\Response\Response;
use ModulesGarden\GGSModule\Core\DataProviders\CrudProvider;

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