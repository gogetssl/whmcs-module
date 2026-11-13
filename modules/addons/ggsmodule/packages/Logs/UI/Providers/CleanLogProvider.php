<?php

namespace ModulesGarden\ggsmodule\Packages\Logs\UI\Providers;

use ModulesGarden\ggsmodule\Core\DataProviders\CrudProvider;
use ModulesGarden\ggsmodule\Core\Support\Facades\Config;
use ModulesGarden\ggsmodule\Packages\Logs\Models\Logs;

/**
 * "Clean log": removes every entry of the module log
 */
class CleanLogProvider extends CrudProvider
{
    public function delete()
    {
        if (!Config::get('logs.delete_logs.enabled', true))
        {
            throw new \Exception('deletingLogsIsNotAllowed');
        }

        Logs::query()->delete();
    }
}
