<?php

namespace ModulesGarden\GGSModule\Packages\Logs\Listeners;

use ModulesGarden\GGSModule\Core\Database\FileLoader;
use ModulesGarden\GGSModule\Core\Events\Listener;
use ModulesGarden\GGSModule\Core\ModuleConstants;

class ModuleActivated extends Listener
{
    public function handle($payload = [])
    {
        (new FileLoader())->performQueryFromFile(ModuleConstants::getFullPath('packages', 'Logs', 'resources', 'database', 'schema.sql'));
    }
}
