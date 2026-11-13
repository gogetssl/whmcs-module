<?php

namespace ModulesGarden\ggsmodule\App\UI\Admin\Import\Index\Providers;

use ModulesGarden\ggsmodule\App\UI\Admin\Import\Index\Forms\GetCsvForm;
use ModulesGarden\ggsmodule\Core\Components\Actions\DownloadFileFromForm;
use ModulesGarden\ggsmodule\Core\Components\Response\Response;
use WHMCS\Database\Capsule;
use ModulesGarden\ggsmodule\Core\DataProviders\CrudProvider;


class TemplateDownloadProvider extends CrudProvider
{
    public function read()
    {

    }


    public function create()
    {
        return (new Response())
            ->setSuccess($this->translate('success'))
            ->setActions([
                             new DownloadFileFromForm(new GetCsvForm(), $this->formData->toArray()),
                         ]);
    }
}