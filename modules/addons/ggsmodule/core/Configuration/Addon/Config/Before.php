<?php

namespace ModulesGarden\ggsmodule\Core\Configuration\Addon\Config;

use ModulesGarden\ggsmodule\Core\Configuration\Addon\AbstractBefore;

/**
 * Runs before loading module configuration
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
