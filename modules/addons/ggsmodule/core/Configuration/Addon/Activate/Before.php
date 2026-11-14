<?php

namespace ModulesGarden\GGSModule\Core\Configuration\Addon\Activate;

use ModulesGarden\GGSModule\Core\Configuration\Addon\AbstractBefore;
use ModulesGarden\GGSModule\Core\ModuleConstants;
use ModulesGarden\GGSModule\Core\ServiceLocator;

/**
 * Runs before module activation actions
 */
class Before extends AbstractBefore
{
    /**
     * @param array $params
     * @return array
     */
    public function execute(array $params = [])
    {
        return $params;
    }
}
