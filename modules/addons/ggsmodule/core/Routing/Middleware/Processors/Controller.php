<?php

namespace ModulesGarden\GGSModule\Core\Routing\Middleware\Processors;

use ModulesGarden\GGSModule\Core\Http\Request;
use ModulesGarden\GGSModule\Core\Routing\Route;
use ModulesGarden\GGSModule\Core\Support\Facades\Config;

class Controller
{
    public function run(Route $route, Request $request, callable $caller)
    {
        $next = fn($request) => $caller();

        foreach (Config::get('middlewares', []) as $middleware)
        {
            $next = fn($request) => $middleware($request, $next);
        }

        return $next($request);
    }
}