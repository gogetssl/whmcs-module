<?php

namespace ModulesGarden\GGSModule\Core\Services;

use ModulesGarden\GGSModule\Core\ModuleConstants;
use ModulesGarden\GGSModule\Core\Routing\Url;
use ModulesGarden\GGSModule\Core\Support\Facades\Translator;
use ModulesGarden\GGSModule\Core\UI\Breadcrumbs\Item;
use ModulesGarden\GGSModule\Core\Support\Facades\Request;

class Breadcrumbs extends \ModulesGarden\GGSModule\Core\UI\Breadcrumbs\Breadcrumbs
{
    public function __construct()
    {
        $this->addDefault();
    }

    protected function addDefault()
    {
        $route = \ModulesGarden\GGSModule\Core\Support\Facades\Router::getCurrentRoute();
        if (!$route)
        {
            return;
        }

        $level = ModuleConstants::getLevel();
        $this->add(new Item(Translator::get($level . '.breadcrumbs.' . $route->getName()), Url::route($route->getName())));

        if ($route->getAction() && $route->getAction() != ModuleConstants::DEFAULT_CONTROLLER_ACTION)
        {
            $this->add(new Item(Translator::get($level . '.breadcrumbs.' . $route->getName() . '_' . $route->getAction()), Url::route($route->getName() . '@' . $route->getAction(), Request::query()->all())));
        }
    }
}
