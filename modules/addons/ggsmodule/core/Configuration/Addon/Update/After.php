<?php

namespace ModulesGarden\ggsmodule\Core\Configuration\Addon\Update;

use ModulesGarden\ggsmodule\Core\Configuration\Addon\AbstractAfter;

/**
 * runs after module update actions
 */
class After extends AbstractAfter
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
