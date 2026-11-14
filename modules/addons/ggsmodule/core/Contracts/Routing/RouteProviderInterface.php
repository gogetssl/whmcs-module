<?php

namespace ModulesGarden\GGSModule\Core\Contracts\Routing;

use ModulesGarden\GGSModule\Core\Routing\Route;

interface RouteProviderInterface
{
    public function find(\Symfony\Component\HttpFoundation\Request $request, string $level) : ?Route;
}