<?php

namespace ModulesGarden\ggsmodule\Packages\Product\Services;

use ModulesGarden\ggsmodule\Core\Support\Facades\Params;

class ServiceConfiguration
{
    public function getConfig(string $name, $default = null)
    {
        return Params::get('configoptions.' . $name, $default);
    }

    public function getCustomField(string $name, $default = null)
    {
        return Params::get('customfields.' . $name, $default);
    }
}
