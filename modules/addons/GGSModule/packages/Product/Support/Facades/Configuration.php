<?php

namespace ModulesGarden\GGSModule\Packages\Product\Support\Facades;

use ModulesGarden\GGSModule\Core\Support\Facades\AbstractFacade;
use ModulesGarden\GGSModule\Packages\Product\Libs\Configuration\ConfigurationContainer;

/**
 * @method static ConfigurationContainer getConfiguration()
 * @method static setConfiguration(ConfigurationContainer $configuration)
 */
class Configuration extends AbstractFacade
{
    protected static function getFacadeAccessor(): string
    {
        return \ModulesGarden\GGSModule\Packages\Product\Services\Configuration::class;
    }
}