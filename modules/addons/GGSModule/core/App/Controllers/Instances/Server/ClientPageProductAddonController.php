<?php

namespace ModulesGarden\GGSModule\Core\App\Controllers\Instances\Server;

use ModulesGarden\GGSModule\Core\Contracts\Controllers\ClientAreaInterface;
use ModulesGarden\GGSModule\Core\ModuleConstants;

class ClientPageProductAddonController extends ClientPageController implements ClientAreaInterface
{
    public function execute($params = null)
    {
        return \ModulesGarden\GGSModule\Core\Support\Facades\Smarty::view('clientarea', parent::run($params), ModuleConstants::getTemplateDir() . '/controllers');
    }
}