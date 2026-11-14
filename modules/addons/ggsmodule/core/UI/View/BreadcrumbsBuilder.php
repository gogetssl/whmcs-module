<?php

namespace ModulesGarden\GGSModule\Core\UI\View;

use ModulesGarden\GGSModule\Components\AppBreadcrumb\AppBreadcrumb;
use ModulesGarden\GGSModule\Core\Support\Facades\Breadcrumbs;

class BreadcrumbsBuilder
{
    public function create(): AppBreadcrumb
    {
        $breadcrumb = new AppBreadcrumb();
        $breadcrumb->setItems(Breadcrumbs::get());

        return $breadcrumb;
    }
}