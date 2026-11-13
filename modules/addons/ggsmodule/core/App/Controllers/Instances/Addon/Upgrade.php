<?php

namespace ModulesGarden\ggsmodule\Core\App\Controllers\Instances\Addon;

use ModulesGarden\ggsmodule\Core\Contracts\Controllers\AddonControllerInterface;
use ModulesGarden\ggsmodule\Core\Module\Addon;
use ModulesGarden\ggsmodule\Core\Support\Facades\LogActivity;

class Upgrade extends \ModulesGarden\ggsmodule\Core\App\Controllers\Instances\AddonController implements AddonControllerInterface
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
