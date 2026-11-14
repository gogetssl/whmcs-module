<?php

namespace ModulesGarden\GGSModule\App\Http\Actions;

use ModulesGarden\GGSModule\Core\App\Controllers\Instances\Server\Action;
use ModulesGarden\GGSModule\Packages\Samples\Http\Admin\Samples;

class AdminServicesTabFields extends Action
{
    public function execute($params = null)
    {
        return [Samples::class, 'samplesIntegration'];
    }
}
