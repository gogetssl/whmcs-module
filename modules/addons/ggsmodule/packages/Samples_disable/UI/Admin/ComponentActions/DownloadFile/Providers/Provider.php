<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\ComponentActions\DownloadFile\Providers;

use ModulesGarden\ggsmodule\Core\DataProviders\CrudProvider;
use ModulesGarden\ggsmodule\Core\Http\BinaryFileResponse;
use ModulesGarden\ggsmodule\Core\Http\Response;

class Provider extends CrudProvider
{
    public function read()
    {
        return (new BinaryFileResponse(__FILE__));
    }
}