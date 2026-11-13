<?php

use ModulesGarden\ggsmodule\App\Cron\TestCommand;

return [
    'commands' => function () {
        return [
            new \ModulesGarden\ggsmodule\Packages\Scheduler\Models\Command(TestCommand::class, "*/5 * * * *", ['someParam' => 997])
        ];
    }
];
