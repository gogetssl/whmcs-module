<?php

namespace ModulesGarden\GGSModule\Core\Traits;

use ModulesGarden\GGSModule\Core\ServiceLocator;

/**
 * Description of IsDebugOn
 *
 * @deprecated
 */
trait IsDebugOn
{
    public function isDebugOn()
    {
        return \ModulesGarden\GGSModule\Core\Support\Facades\Config::get('configuration.debug');
    }
}
