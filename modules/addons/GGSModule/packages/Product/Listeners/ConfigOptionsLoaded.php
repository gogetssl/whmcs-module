<?php

namespace ModulesGarden\GGSModule\Packages\Product\Listeners;

use ModulesGarden\GGSModule\Core\Events\Listener;
use ModulesGarden\GGSModule\Core\Support\Facades\LogActivity;
use ModulesGarden\GGSModule\Packages\Product\Database\Tables\TablesManager;
use Illuminate\Database\Capsule\Manager as DB;

class ConfigOptionsLoaded extends Listener
{
    public function handle($payload = [])
    {
        try
        {
            TablesManager::processSchemaQueries();
            TablesManager::processUpgradeQueries();
        }
        catch (\Throwable $ex)
        {
            LogActivity::error($ex->getMessage());
        }
    }
}
