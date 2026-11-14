<?php

namespace ModulesGarden\GGSModule\App\Http\Actions;

use ModulesGarden\GGSModule\App\Http\Admin\Home;
use ModulesGarden\GGSModule\Core\UI\ViewConfigOptions;
use ModulesGarden\GGSModule\Core\UI\ViewIntegrationAddon;
use ModulesGarden\GGSModule\Packages\Samples\Http\Admin\Samples;

class ConfigOptions extends \ModulesGarden\GGSModule\Core\App\Controllers\Instances\Server\ConfigOptions
{
    public function execute($params = null)
    {
        return (new ViewConfigOptions())->addElement(new \ModulesGarden\GGSModule\App\UI\Actions\ConfigOptions());
    }
}
