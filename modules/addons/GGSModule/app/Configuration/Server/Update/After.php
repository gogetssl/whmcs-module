<?php

namespace ModulesGarden\GGSModule\App\Configuration\Server\Update;

/**
 * runs after module update actions
 */
class After extends \ModulesGarden\GGSModule\Core\Configuration\Addon\Update\After
{
    /**
     * @param array $params
     * @return array
     */
    public function execute(array $params = [])
    {
        $return = parent::execute($params);

        return $return;
    }
}
