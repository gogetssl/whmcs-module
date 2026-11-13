<?php

namespace ModulesGarden\ggsmodule\Core\Routing\Middleware;

use ModulesGarden\ggsmodule\Core\Http\Request;

abstract class AbstractMiddleware
{
    public function __invoke(Request $request, \Closure $next)/*: \ModulesGarden\ggsmodule\Core\Http\Response*/
    {
        return $next($request);
    }
}