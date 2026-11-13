<?php

namespace ModulesGarden\ggsmodule\Core\Configuration\Addon\Activate;

use ModulesGarden\ggsmodule\Core\Configuration\Addon\AbstractBefore;
use ModulesGarden\ggsmodule\Core\ModuleConstants;
use ModulesGarden\ggsmodule\Core\ServiceLocator;

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
