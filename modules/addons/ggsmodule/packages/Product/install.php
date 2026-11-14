<?php

use ModulesGarden\GGSModule\Core\Hook\HookManager;
use ModulesGarden\GGSModule\Packages\Product\Services\ProductDuplicate;
use ModulesGarden\GGSModule\Core\Events\Events\ConfigOptionsLoaded;
use ModulesGarden\GGSModule\Core\Events\Events\ModuleActivated;
use ModulesGarden\GGSModule\Core\Events\Events\ModuleUpgraded;
use function ModulesGarden\GGSModule\Core\listen;

return [
    'bootstrap' => function() {
        HookManager::create(__DIR__, true);
        ProductDuplicate::checkAndInitDuplicateProcess();

        listen(ModuleActivated::class,\ModulesGarden\GGSModule\Packages\Product\Listeners\ModuleActivated::class);
        listen(ModuleUpgraded::class,\ModulesGarden\GGSModule\Packages\Product\Listeners\ModuleUpgraded::class);
        listen(ConfigOptionsLoaded::class,\ModulesGarden\GGSModule\Packages\Product\Listeners\ConfigOptionsLoaded::class);

        //Register Configuration Service
        \ModulesGarden\GGSModule\Core\DependencyInjection\Container::getInstance()
            ->singleton(\ModulesGarden\GGSModule\Packages\Product\Services\Configuration::class);
    },
    'packages'    => [
        'ModuleSettings',
    ],
];
