<?php

namespace ModulesGarden\ggsmodule\App\Configuration\Server\Update;

/**
 * runs before module update actions
 */
class Before extends \ModulesGarden\ggsmodule\Core\Configuration\Addon\Update\Before
{
    /**
     * @return array
     */
    public function execute($version)
    {
        $return = parent::execute($version);

        return $return;
    }
}
