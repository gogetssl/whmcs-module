<?php

use ModulesGarden\ggsmodule\Core\App\Controllers\Instances\Addon\Config;
use ModulesGarden\ggsmodule\Core\DependencyInjection\PackageServices;
use ModulesGarden\ggsmodule\Core\Events\Dispatcher;
use ModulesGarden\ggsmodule\Core\Lang\Lang;
use ModulesGarden\ggsmodule\Core\Services\Breadcrumbs;
use ModulesGarden\ggsmodule\Core\Services\Messages;
use ModulesGarden\ggsmodule\Core\Services\Route;
use ModulesGarden\ggsmodule\Core\Services\Translator;
use ModulesGarden\ggsmodule\Core\Services\Validator;
use ModulesGarden\ggsmodule\Core\Session\Session;

return [
    Dispatcher::class,

    //New
    Translator::class,
    Validator::class,
    PackageServices::class,
    \ModulesGarden\ggsmodule\Core\Services\Params::class,
    Session::class,
    Breadcrumbs::class,
    Messages::class,
    \ModulesGarden\ggsmodule\Core\Services\Router::class,
    \ModulesGarden\ggsmodule\Core\Services\Smarty::class,
    \ModulesGarden\ggsmodule\Core\Services\Request::class,
    \ModulesGarden\ggsmodule\Core\Services\Config::class,
    \ModulesGarden\ggsmodule\Core\Services\Binder::class,
    \ModulesGarden\ggsmodule\Core\Services\Menu::class,
    Lang::class,
    \ModulesGarden\ggsmodule\Core\Services\Store::class
];
