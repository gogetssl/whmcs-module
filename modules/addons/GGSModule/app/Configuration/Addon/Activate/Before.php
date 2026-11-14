<?php

namespace ModulesGarden\GGSModule\App\Configuration\Addon\Activate;

use ModulesGarden\GGSModule\App\Helpers\EmailTemplates;

/**
 * Runs before module activation actions
 */
class Before extends \ModulesGarden\GGSModule\Core\Configuration\Addon\Activate\Before
{
    /**
     * @param array $params
     * @return array
     */
    public function execute(array $params = [])
    {
        $return = parent::execute($params);

        EmailTemplates::createTemplates();

        return $return;
    }
}
