<?php

namespace ModulesGarden\ggsmodule\Core\UI\View;

use ModulesGarden\ggsmodule\Components\AppBreadcrumb\AppBreadcrumb;
use ModulesGarden\ggsmodule\Core\Support\Facades\Breadcrumbs;

class BreadcrumbsBuilder
{
    public function create(): AppBreadcrumb
    {
        $breadcrumb = new AppBreadcrumb();
        $breadcrumb->setItems(Breadcrumbs::get());

        return $breadcrumb;
    }
}