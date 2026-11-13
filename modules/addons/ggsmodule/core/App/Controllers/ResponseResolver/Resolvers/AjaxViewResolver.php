<?php

namespace ModulesGarden\ggsmodule\Core\App\Controllers\ResponseResolver\Resolvers;

use ModulesGarden\ggsmodule\Core\App\Controllers\ResponseResolver\ResolverInterface;
use ModulesGarden\ggsmodule\Core\UI\ViewAjax;

class AjaxViewResolver implements ResolverInterface
{
    public function canResolve($response): bool
    {
        return false;

        return get_class($response) == ViewAjax::class;
    }

    public function resolve($response)
    {
        die('adawdwad');
    }
}
