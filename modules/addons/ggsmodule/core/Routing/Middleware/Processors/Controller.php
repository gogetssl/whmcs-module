<?php

namespace ModulesGarden\ggsmodule\Core\Routing\Middleware\Processors;

use ModulesGarden\ggsmodule\Core\Http\Request;
use ModulesGarden\ggsmodule\Core\Routing\Route;
use ModulesGarden\ggsmodule\Core\Support\Facades\Config;

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