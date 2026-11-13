<?php

namespace ModulesGarden\ggsmodule\App\Http\Actions;

use ModulesGarden\ggsmodule\App\Http\Admin\Home;
use ModulesGarden\ggsmodule\Core\UI\ViewConfigOptions;
use ModulesGarden\ggsmodule\Core\UI\ViewIntegrationAddon;
use ModulesGarden\ggsmodule\Packages\Samples\Http\Admin\Samples;

class ConfigOptions extends \ModulesGarden\ggsmodule\Core\App\Controllers\Instances\Server\ConfigOptions
{
    public function execute($params = null)
    {
        return (new ViewConfigOptions())->addElement(new \ModulesGarden\ggsmodule\App\UI\Actions\ConfigOptions());
    }
}
