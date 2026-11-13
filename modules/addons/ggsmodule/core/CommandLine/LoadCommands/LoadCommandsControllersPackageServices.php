<?php

namespace ModulesGarden\ggsmodule\Core\CommandLine\LoadCommands;

use ModulesGarden\ggsmodule\Core\DependencyInjection\PackageServices;
use function ModulesGarden\ggsmodule\Core\make;

class LoadCommandsControllersPackageServices implements LoadCommandsControllersInterface
{
    public function getCommands(string $dir = null): array
    {
        $commands = make(PackageServices::class)->getCommands();

        return $commands;
    }
}
