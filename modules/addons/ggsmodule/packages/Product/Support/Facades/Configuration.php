<?php

namespace ModulesGarden\ggsmodule\Packages\Product\Support\Facades;

use ModulesGarden\ggsmodule\Core\Support\Facades\AbstractFacade;
use ModulesGarden\ggsmodule\Packages\Product\Libs\Configuration\ConfigurationContainer;

/**
 * @method static ConfigurationContainer getConfiguration()
 * @method static setConfiguration(ConfigurationContainer $configuration)
 */
class Configuration extends AbstractFacade
{
    protected static function getFacadeAccessor(): string
    {
        return \ModulesGarden\ggsmodule\Packages\Product\Services\Configuration::class;
    }
}