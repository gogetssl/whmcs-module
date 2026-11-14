<?php

namespace ModulesGarden\GGSModule\Packages\Logs\UI\Providers;

use ModulesGarden\GGSModule\Core\DataProviders\CrudProvider;
use ModulesGarden\GGSModule\Core\Support\Facades\Config;
use ModulesGarden\GGSModule\Packages\Logs\Models\Logs;

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
