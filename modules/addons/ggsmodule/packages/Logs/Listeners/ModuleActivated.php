<?php

namespace ModulesGarden\ggsmodule\Packages\Logs\Listeners;

use ModulesGarden\ggsmodule\Core\Database\FileLoader;
use ModulesGarden\ggsmodule\Core\Events\Listener;
use ModulesGarden\ggsmodule\Core\ModuleConstants;

class ModuleActivated extends Listener
{
    public function handle($payload = [])
    {
        (new FileLoader())->performQueryFromFile(ModuleConstants::getFullPath('packages', 'Logs', 'resources', 'database', 'schema.sql'));
    }
}
