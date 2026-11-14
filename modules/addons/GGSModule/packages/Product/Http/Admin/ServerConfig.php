<?php

namespace ModulesGarden\GGSModule\Packages\Product\Http\Admin;

use ModulesGarden\GGSModule\Core\Contracts\Controllers\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Helper;
use ModulesGarden\GGSModule\Core\Http\AbstractController;
use ModulesGarden\GGSModule\Core\ModuleConstants;
use ModulesGarden\GGSModule\Core\Support\Facades\Config;
use ModulesGarden\GGSModule\Core\Support\Facades\Request;
use ModulesGarden\GGSModule\Core\WHMCS\Models\Server;
use ModulesGarden\GGSModule\Packages\Product\Enums\ConfigSettings;
use function ModulesGarden\GGSModule\Core\Helper;

class ServerConfig extends AbstractController implements AdminAreaInterface
{
    public function index()
    {
        if (!Config::get(ConfigSettings::PRODUCT_SERVER_CONFIG_FORM)) {
            return;
        }

        $serverId = Request::get('id', null);
        if (is_null($serverId)) {
            return;
        }

        $server = Server::findOrFail($serverId);
        if (ModuleConstants::getModuleName() !== $server->type) {
            return;
        }

        return Helper\viewIntegrationAddon()
            ->addElement(\ModulesGarden\GGSModule\Packages\Product\UI\Buttons\ServerConfiguration::class);
    }
}
