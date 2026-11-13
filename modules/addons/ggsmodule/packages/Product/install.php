<?php

use ModulesGarden\ggsmodule\Core\Hook\HookManager;
use ModulesGarden\ggsmodule\Packages\Product\Services\ProductDuplicate;
use ModulesGarden\ggsmodule\Core\Events\Events\ConfigOptionsLoaded;
use ModulesGarden\ggsmodule\Core\Events\Events\ModuleActivated;
use ModulesGarden\ggsmodule\Core\Events\Events\ModuleUpgraded;
use function ModulesGarden\ggsmodule\Core\listen;

return [
    'bootstrap' => function() {
        HookManager::create(__DIR__, true);
        ProductDuplicate::checkAndInitDuplicateProcess();

        listen(ModuleActivated::class,\ModulesGarden\ggsmodule\Packages\Product\Listeners\ModuleActivated::class);
        listen(ModuleUpgraded::class,\ModulesGarden\ggsmodule\Packages\Product\Listeners\ModuleUpgraded::class);
        listen(ConfigOptionsLoaded::class,\ModulesGarden\ggsmodule\Packages\Product\Listeners\ConfigOptionsLoaded::class);

        //Register Configuration Service
        \ModulesGarden\ggsmodule\Core\DependencyInjection\Container::getInstance()
            ->singleton(\ModulesGarden\ggsmodule\Packages\Product\Services\Configuration::class);
    },
    'packages'    => [
        'ModuleSettings',
    ],
];
