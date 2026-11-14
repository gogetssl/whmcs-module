<?php

namespace ModulesGarden\GGSModule\App\Configuration\Addon\Update;

/**
 * runs before module update actions
 */
class Before extends \ModulesGarden\GGSModule\Core\Configuration\Addon\Update\Before
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
