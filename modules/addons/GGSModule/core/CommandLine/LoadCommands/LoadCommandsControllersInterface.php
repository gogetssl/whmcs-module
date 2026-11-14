<?php

namespace ModulesGarden\GGSModule\Core\CommandLine\LoadCommands;

interface LoadCommandsControllersInterface
{
    public function getCommands(string $dir = null): array;
}
