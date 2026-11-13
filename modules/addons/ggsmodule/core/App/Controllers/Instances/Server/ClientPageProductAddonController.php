<?php

namespace ModulesGarden\ggsmodule\Core\App\Controllers\Instances\Server;

use ModulesGarden\ggsmodule\Core\Contracts\Controllers\ClientAreaInterface;
use ModulesGarden\ggsmodule\Core\ModuleConstants;

class ClientPageProductAddonController extends ClientPageController implements ClientAreaInterface
{
    public function execute($params = null)
    {
        return \ModulesGarden\ggsmodule\Core\Support\Facades\Smarty::view('clientarea', parent::run($params), ModuleConstants::getTemplateDir() . '/controllers');
    }
}