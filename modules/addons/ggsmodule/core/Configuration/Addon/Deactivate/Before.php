<?php

namespace ModulesGarden\ggsmodule\Core\Configuration\Addon\Deactivate;

use ModulesGarden\ggsmodule\Core\Configuration\Addon\AbstractBefore;

/**
 * Runs before addon deactivation
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
