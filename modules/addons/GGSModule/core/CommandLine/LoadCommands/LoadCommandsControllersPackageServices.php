<?php

namespace ModulesGarden\GGSModule\Core\CommandLine\LoadCommands;

use ModulesGarden\GGSModule\Core\DependencyInjection\PackageServices;
use function ModulesGarden\GGSModule\Core\make;

class LoadCommandsControllersPackageServices implements LoadCommandsControllersInterface
{
    public function getCommands(string $dir = null): array
    {
        $commands = make(PackageServices::class)->getCommands();

        return $commands;
    }
}
