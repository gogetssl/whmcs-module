<?php

namespace ModulesGarden\ggsmodule\App\Http\Actions;

use ModulesGarden\ggsmodule\Core\App\Controllers\Instances\Server\Action;
use ModulesGarden\ggsmodule\Packages\Samples\Http\Admin\Samples;

class AdminServicesTabFields extends Action
{
    public function execute($params = null)
    {
        return [Samples::class, 'samplesIntegration'];
    }
}
