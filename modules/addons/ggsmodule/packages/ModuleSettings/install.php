<?php

use ModulesGarden\GGSModule\Core\Events\Events\ModuleActivated;
use ModulesGarden\GGSModule\Core\Events\Events\PreServerConfigurationLoaded;
use ModulesGarden\GGSModule\Core\Events\Events\ConfigOptionsLoaded;
use function ModulesGarden\GGSModule\Core\listen;

return [
    'bootstrap' => function() {
        listen(ModuleActivated::class, \ModulesGarden\GGSModule\Packages\ModuleSettings\Listeners\ModuleActivated::class);
        listen(PreServerConfigurationLoaded::class, \ModulesGarden\GGSModule\Packages\ModuleSettings\Listeners\PreServerConfigurationLoaded::class);
        listen(ConfigOptionsLoaded::class, \ModulesGarden\GGSModule\Packages\ModuleSettings\Listeners\ModuleActivated::class);

        \ModulesGarden\GGSModule\Core\DependencyInjection\Container::getInstance()->singleton(\ModulesGarden\GGSModule\Packages\ModuleSettings\Services\ModuleSettings::class);
    },
];
