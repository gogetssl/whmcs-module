<?php

namespace ModulesGarden\GGSModule\App\UI\Admin\Reports\Index\DataTables\DatewiseSales\Providers;

use ModulesGarden\GGSModule\App\UI\Admin\Reports\Index\DataTables\DatewiseSales\Forms\GetCsvForm;
use ModulesGarden\GGSModule\Core\Components\Actions\DownloadFileFromForm;
use ModulesGarden\GGSModule\Core\Components\Response\Response;
use ModulesGarden\GGSModule\Core\DataProviders\CrudProvider;

class DownloadProvider extends CrudProvider
{
    public function read()
    {
        $this->data = $this->formData;
    }

    public function create()
    {
        return (new Response())
            ->setSuccess($this->translate('csvExportedSuccessfully'))
            ->setActions([
                             new DownloadFileFromForm(new GetCsvForm(), $this->formData->toArray()),
                         ]);
    }
}