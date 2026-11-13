<?php

namespace ModulesGarden\ggsmodule\Packages\Product\Http\Admin;

use ModulesGarden\ggsmodule\Core\Contracts\Controllers\AdminAreaInterface;
use ModulesGarden\ggsmodule\Core\Helper;
use ModulesGarden\ggsmodule\Core\Http\AbstractController;
use ModulesGarden\ggsmodule\Core\ModuleConstants;
use ModulesGarden\ggsmodule\Core\Support\Facades\Config;
use ModulesGarden\ggsmodule\Core\Support\Facades\Request;
use ModulesGarden\ggsmodule\Core\WHMCS\Models\Server;
use ModulesGarden\ggsmodule\Packages\Product\Enums\ConfigSettings;
use function ModulesGarden\ggsmodule\Core\Helper;

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
            ->addElement(\ModulesGarden\ggsmodule\Packages\Product\UI\Buttons\ServerConfiguration::class);
    }
}
