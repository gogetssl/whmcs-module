<?php

namespace ModulesGarden\ggsmodule\Core\App\Controllers\Instances\Http;

use ModulesGarden\ggsmodule\Core\App\Controllers\Instances\HttpController;
use ModulesGarden\ggsmodule\Core\ModuleConstants;
use ModulesGarden\ggsmodule\Core\UI\AbstractPartialView;
use ModulesGarden\ggsmodule\Core\UI\View;
use ModulesGarden\ggsmodule\Core\UI\Views\AddonModuleAdminArea;

class AdminPageController extends HttpController implements \ModulesGarden\ggsmodule\Core\Contracts\Controllers\AdminAreaInterface
{
    public function execute($params = null)
    {
        return \ModulesGarden\ggsmodule\Core\Support\Facades\Smarty::view('adminarea', parent::run($params), ModuleConstants::getTemplateDir() . '/controllers');
    }

    protected function preResolveResponse()
    {
        if($this->controllerResult instanceof View)
        {
            $this->controllerResult = new AddonModuleAdminArea($this->controllerResult);
        }
    }
}
