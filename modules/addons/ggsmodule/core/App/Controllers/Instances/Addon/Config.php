<?php

namespace ModulesGarden\ggsmodule\Core\App\Controllers\Instances\Addon;

use ModulesGarden\ggsmodule\Core\Configuration\Data;
use ModulesGarden\ggsmodule\Core\Contracts\Controllers\AddonControllerInterface;

/**
 * Module configuration wrapper
 */
class Config extends \ModulesGarden\ggsmodule\Core\App\Controllers\Instances\AddonController implements AddonControllerInterface
{
    public function execute($params = [])
    {
        return [
            'name'        => \ModulesGarden\ggsmodule\Core\Support\Facades\Config::get('configuration.systemName'),
            'description' => \ModulesGarden\ggsmodule\Core\Support\Facades\Config::get('configuration.description'),
            'version'     => \ModulesGarden\ggsmodule\Core\Support\Facades\Config::get('configuration.version'),
            'author'      => \ModulesGarden\ggsmodule\Core\Support\Facades\Config::get('configuration.author'),
            'fields'      => \ModulesGarden\ggsmodule\Core\Support\Facades\Config::get('configuration.fields', [])
        ];
    }
}
