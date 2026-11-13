<?php

namespace ModulesGarden\ggsmodule\Core\Traits;

use ModulesGarden\ggsmodule\Core\ServiceLocator;

/**
 * Description of IsDebugOn
 *
 * @deprecated
 */
trait IsDebugOn
{
    public function isDebugOn()
    {
        return \ModulesGarden\ggsmodule\Core\Support\Facades\Config::get('configuration.debug');
    }
}
