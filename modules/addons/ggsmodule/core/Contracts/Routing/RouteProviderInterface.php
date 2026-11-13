<?php

namespace ModulesGarden\ggsmodule\Core\Contracts\Routing;

use ModulesGarden\ggsmodule\Core\Routing\Route;

interface RouteProviderInterface
{
    public function find(\Symfony\Component\HttpFoundation\Request $request, string $level) : ?Route;
}