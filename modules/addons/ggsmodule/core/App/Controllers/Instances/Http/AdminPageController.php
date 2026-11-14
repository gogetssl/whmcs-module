<?php

namespace ModulesGarden\GGSModule\Core\App\Controllers\Instances\Http;

use ModulesGarden\GGSModule\Core\App\Controllers\Instances\HttpController;
use ModulesGarden\GGSModule\Core\ModuleConstants;
use ModulesGarden\GGSModule\Core\UI\AbstractPartialView;
use ModulesGarden\GGSModule\Core\UI\View;
use ModulesGarden\GGSModule\Core\UI\Views\AddonModuleAdminArea;

class AdminPageController extends HttpController implements \ModulesGarden\GGSModule\Core\Contracts\Controllers\AdminAreaInterface
{
    public function execute($params = null)
    {
        return \ModulesGarden\GGSModule\Core\Support\Facades\Smarty::view('adminarea', parent::run($params), ModuleConstants::getTemplateDir() . '/controllers');
    }

    protected function preResolveResponse()
    {
        if($this->controllerResult instanceof View)
        {
            $this->controllerResult = new AddonModuleAdminArea($this->controllerResult);
        }
    }
}
