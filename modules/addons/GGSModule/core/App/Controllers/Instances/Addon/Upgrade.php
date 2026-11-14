<?php

namespace ModulesGarden\GGSModule\Core\App\Controllers\Instances\Addon;

use ModulesGarden\GGSModule\Core\Contracts\Controllers\AddonControllerInterface;
use ModulesGarden\GGSModule\Core\Module\Addon;
use ModulesGarden\GGSModule\Core\Support\Facades\LogActivity;

class Upgrade extends \ModulesGarden\GGSModule\Core\App\Controllers\Instances\AddonController implements AddonControllerInterface
{
    public function execute($params = []): array
    {
        try
        {
            Addon::upgrade($params);

            return ['status' => 'success'];
        }
        catch (\Throwable $exc)
        {
            LogActivity::error($exc->getMessage());

            return [
                'status'      => 'error',
                'description' => $exc->getMessage(),
            ];
        }
    }
}
