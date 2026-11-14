<?php

namespace ModulesGarden\GGSModule\Core\Routing\Middleware;

use ModulesGarden\GGSModule\Core\Http\Request;

abstract class AbstractMiddleware
{
    public function __invoke(Request $request, \Closure $next)/*: \ModulesGarden\GGSModule\Core\Http\Response*/
    {
        return $next($request);
    }
}