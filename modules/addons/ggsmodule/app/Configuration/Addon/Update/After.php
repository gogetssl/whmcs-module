<?php

namespace ModulesGarden\GGSModule\App\Configuration\Addon\Update;

use ModulesGarden\GGSModule\Core\Database\FileLoader;
use ModulesGarden\GGSModule\Core\ModuleConstants;

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

        $fileLoader = new FileLoader();
        $fileLoader->performQueryFromFile(ModuleConstants::getFullPath('app', 'Database', 'schema.sql'));
        // columns added to existing tables
        \ModulesGarden\GGSModule\App\Libs\AisHelpers::ensureColumns();

        return $return;
    }
}
