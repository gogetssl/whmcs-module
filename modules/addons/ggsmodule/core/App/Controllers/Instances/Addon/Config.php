<?php

namespace ModulesGarden\GGSModule\Core\App\Controllers\Instances\Addon;

use ModulesGarden\GGSModule\Core\Configuration\Data;
use ModulesGarden\GGSModule\Core\Contracts\Controllers\AddonControllerInterface;

/**
 * Module configuration wrapper
 */
class Config extends \ModulesGarden\GGSModule\Core\App\Controllers\Instances\AddonController implements AddonControllerInterface
{
    public function execute($params = [])
    {
        return [
            'name'        => \ModulesGarden\GGSModule\Core\Support\Facades\Config::get('configuration.systemName'),
            'description' => \ModulesGarden\GGSModule\Core\Support\Facades\Config::get('configuration.description'),
            'version'     => \ModulesGarden\GGSModule\Core\Support\Facades\Config::get('configuration.version'),
            'author'      => \ModulesGarden\GGSModule\Core\Support\Facades\Config::get('configuration.author'),
            'fields'      => \ModulesGarden\GGSModule\Core\Support\Facades\Config::get('configuration.fields', [])
        ];
    }
}
