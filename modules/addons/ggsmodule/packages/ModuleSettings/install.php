<?php

use ModulesGarden\ggsmodule\Core\Events\Events\ModuleActivated;
use ModulesGarden\ggsmodule\Core\Events\Events\PreServerConfigurationLoaded;
use ModulesGarden\ggsmodule\Core\Events\Events\ConfigOptionsLoaded;
use function ModulesGarden\ggsmodule\Core\listen;

return [
    'bootstrap' => function() {
        listen(ModuleActivated::class, \ModulesGarden\ggsmodule\Packages\ModuleSettings\Listeners\ModuleActivated::class);
        listen(PreServerConfigurationLoaded::class, \ModulesGarden\ggsmodule\Packages\ModuleSettings\Listeners\PreServerConfigurationLoaded::class);
        listen(ConfigOptionsLoaded::class, \ModulesGarden\ggsmodule\Packages\ModuleSettings\Listeners\ModuleActivated::class);

        \ModulesGarden\ggsmodule\Core\DependencyInjection\Container::getInstance()->singleton(\ModulesGarden\ggsmodule\Packages\ModuleSettings\Services\ModuleSettings::class);
    },
];
