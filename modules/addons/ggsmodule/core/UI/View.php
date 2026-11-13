<?php

namespace ModulesGarden\ggsmodule\Core\UI;

use ModulesGarden\ggsmodule\Components\AppNavBar\Breadcrumb;
use ModulesGarden\ggsmodule\Components\OverlayComponents\OverlayComponents;
use ModulesGarden\ggsmodule\Core\Helper\BuildUrl;
use ModulesGarden\ggsmodule\Core\Helper\RandomStringGenerator;
use ModulesGarden\ggsmodule\Core\ModuleConstants;
use ModulesGarden\ggsmodule\Core\UI\View\AlertsBuilder;
use ModulesGarden\ggsmodule\Core\UI\View\BreadcrumbsBuilder;
use ModulesGarden\ggsmodule\Core\UI\View\NavBarBuilder;
use function ModulesGarden\ggsmodule\Core\Helper\isAdmin;

/**
 *
 */
class View extends AbstractPartialView
{
    public function __construct()
    {
        $this->initDefaultComponents();
    }

    protected function initDefaultComponents()
    {
        $this->addElement(OverlayComponents::class);
    }

    /**
     * @return mixed
     */
    public function getResponse()
    {
        return $this->buildRootElements($this->elements);
    }
}
