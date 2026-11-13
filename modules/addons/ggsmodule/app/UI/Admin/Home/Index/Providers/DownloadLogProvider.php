<?php

namespace ModulesGarden\ggsmodule\App\UI\Admin\Home\Index\Providers;

use ModulesGarden\ggsmodule\App\Libs\Helpers;
use ModulesGarden\ggsmodule\App\UI\Admin\Home\Index\Shared\LogProvider;
use ModulesGarden\ggsmodule\Core\DataProviders\CrudProvider;


class DownloadLogProvider extends CrudProvider
{
    public function read()
    {
        $data        = $this->formData->toArray();


        $logProvider = new LogProvider();
        $log         = $logProvider->getLog($data);
        $filename    = 'log.txt';

        header('Content-Type: text/txt; charset=utf-8');
        header('Content-Disposition: attachment; filename=' . $filename);

        $output = fopen('php://output', 'w');

        fputs($output, $log);
        die();
    }
}