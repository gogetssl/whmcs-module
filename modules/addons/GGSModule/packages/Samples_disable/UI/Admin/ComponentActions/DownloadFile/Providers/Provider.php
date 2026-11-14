<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\ComponentActions\DownloadFile\Providers;

use ModulesGarden\GGSModule\Core\DataProviders\CrudProvider;
use ModulesGarden\GGSModule\Core\Http\BinaryFileResponse;
use ModulesGarden\GGSModule\Core\Http\Response;

class Provider extends CrudProvider
{
    public function read()
    {
        return (new BinaryFileResponse(__FILE__));
    }
}