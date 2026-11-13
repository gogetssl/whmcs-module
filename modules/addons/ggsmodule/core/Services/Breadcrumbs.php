<?php

namespace ModulesGarden\ggsmodule\Core\Services;

use ModulesGarden\ggsmodule\Core\ModuleConstants;
use ModulesGarden\ggsmodule\Core\Routing\Url;
use ModulesGarden\ggsmodule\Core\Support\Facades\Translator;
use ModulesGarden\ggsmodule\Core\UI\Breadcrumbs\Item;
use ModulesGarden\ggsmodule\Core\Support\Facades\Request;

class Breadcrumbs extends \ModulesGarden\ggsmodule\Core\UI\Breadcrumbs\Breadcrumbs
{
    public function __construct()
    {
        $this->addDefault();
    }

    protected function addDefault()
    {
        $route = \ModulesGarden\ggsmodule\Core\Support\Facades\Router::getCurrentRoute();
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
