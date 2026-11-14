<?php

namespace ModulesGarden\GGSModule\App\UI\Admin\Import\Index\Providers;

use ModulesGarden\GGSModule\App\UI\Admin\Import\Index\Forms\GetCsvForm;
use ModulesGarden\GGSModule\Core\Components\Actions\DownloadFileFromForm;
use ModulesGarden\GGSModule\Core\Components\Response\Response;
use WHMCS\Database\Capsule;
use ModulesGarden\GGSModule\Core\DataProviders\CrudProvider;


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