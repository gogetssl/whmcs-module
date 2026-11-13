<?php

namespace ModulesGarden\ggsmodule\Packages\Product\Listeners;

use ModulesGarden\ggsmodule\Core\Events\Listener;
use ModulesGarden\ggsmodule\Core\Support\Facades\LogActivity;
use ModulesGarden\ggsmodule\Packages\Product\Database\Tables\TablesManager;
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
