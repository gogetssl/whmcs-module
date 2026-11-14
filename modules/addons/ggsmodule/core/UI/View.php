<?php

namespace ModulesGarden\GGSModule\Core\UI;

use ModulesGarden\GGSModule\Components\AppNavBar\Breadcrumb;
use ModulesGarden\GGSModule\Components\OverlayComponents\OverlayComponents;
use ModulesGarden\GGSModule\Core\Helper\BuildUrl;
use ModulesGarden\GGSModule\Core\Helper\RandomStringGenerator;
use ModulesGarden\GGSModule\Core\ModuleConstants;
use ModulesGarden\GGSModule\Core\UI\View\AlertsBuilder;
use ModulesGarden\GGSModule\Core\UI\View\BreadcrumbsBuilder;
use ModulesGarden\GGSModule\Core\UI\View\NavBarBuilder;
use function ModulesGarden\GGSModule\Core\Helper\isAdmin;

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
