<?php

namespace ModulesGarden\GGSModule\Core\App\Controllers\ResponseResolver\Resolvers;

use ModulesGarden\GGSModule\Core\App\Controllers\ResponseResolver\ResolverInterface;
use ModulesGarden\GGSModule\Core\UI\ViewAjax;

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
