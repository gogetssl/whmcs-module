<?php

namespace ModulesGarden\ggsmodule\Packages\Product\Listeners;

use ModulesGarden\ggsmodule\Core\Database\FileLoader;
use ModulesGarden\ggsmodule\Core\Events\Listener;
use ModulesGarden\ggsmodule\Core\ModuleConstants;
use ModulesGarden\ggsmodule\Core\Support\Facades\LogActivity;

class ModuleUpgraded extends Listener
{
    public function handle($payload = [])
    {
        try
        {
            (new FileLoader())->performQueryFromFile(ModuleConstants::getFullPath('packages', 'Product', 'resources', 'database', 'schema.sql'));
        }
        catch (\Throwable $ex)
        {
            LogActivity::error($ex->getMessage());
        }
    }
}