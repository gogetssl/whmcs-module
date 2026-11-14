<?php

use ModulesGarden\GGSModule\App\Cron\TestCommand;

return [
    'commands' => function () {
        return [
            new \ModulesGarden\GGSModule\Packages\Scheduler\Models\Command(TestCommand::class, "*/5 * * * *", ['someParam' => 997])
        ];
    }
];
