<?php

use ModulesGarden\GGSModule\Core\App\Controllers\Instances\Addon\Config;
use ModulesGarden\GGSModule\Core\DependencyInjection\PackageServices;
use ModulesGarden\GGSModule\Core\Events\Dispatcher;
use ModulesGarden\GGSModule\Core\Lang\Lang;
use ModulesGarden\GGSModule\Core\Services\Breadcrumbs;
use ModulesGarden\GGSModule\Core\Services\Messages;
use ModulesGarden\GGSModule\Core\Services\Route;
use ModulesGarden\GGSModule\Core\Services\Translator;
use ModulesGarden\GGSModule\Core\Services\Validator;
use ModulesGarden\GGSModule\Core\Session\Session;

return [
    Dispatcher::class,

    //New
    Translator::class,
    Validator::class,
    PackageServices::class,
    \ModulesGarden\GGSModule\Core\Services\Params::class,
    Session::class,
    Breadcrumbs::class,
    Messages::class,
    \ModulesGarden\GGSModule\Core\Services\Router::class,
    \ModulesGarden\GGSModule\Core\Services\Smarty::class,
    \ModulesGarden\GGSModule\Core\Services\Request::class,
    \ModulesGarden\GGSModule\Core\Services\Config::class,
    \ModulesGarden\GGSModule\Core\Services\Binder::class,
    \ModulesGarden\GGSModule\Core\Services\Menu::class,
    Lang::class,
    \ModulesGarden\GGSModule\Core\Services\Store::class
];
