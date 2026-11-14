<?php

namespace ModulesGarden\GGSModule\Packages\Logs\UI\Providers;

use ModulesGarden\GGSModule\Core\DataProviders\CrudProvider;
use ModulesGarden\GGSModule\Core\Support\Facades\Config;
use ModulesGarden\GGSModule\Packages\Logs\Models\Logs;

class DeleteLogProvider extends CrudProvider
{
    public function delete()
    {
        if (!Config::get('logs.delete_logs.enabled', true))
        {
            throw new \Exception('deletingLogsIsNotAllowed');
        }

        $ids = explode(',', $this->formData['id']);

        Logs::whereIn('id', $ids)
            ->delete();
    }
}
