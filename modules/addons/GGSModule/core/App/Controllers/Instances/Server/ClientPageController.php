<?php

namespace ModulesGarden\GGSModule\Core\App\Controllers\Instances\Server;

use ModulesGarden\GGSModule\App\Hooks\InternalHooks\PreClientAreaPageLoad;
use ModulesGarden\GGSModule\Core\App\Controllers\Instances\HttpController;
use ModulesGarden\GGSModule\Core\Contracts\Controllers\ClientAreaInterface;
use ModulesGarden\GGSModule\Core\ModuleConstants;
use ModulesGarden\GGSModule\Core\Support\Facades\Config;
use ModulesGarden\GGSModule\Core\Support\Facades\Router;
use ModulesGarden\GGSModule\Core\Support\Facades\Translator;
use ModulesGarden\GGSModule\Core\UI\View;
use ModulesGarden\GGSModule\Core\UI\Views\ServerModuleClientArea;

class ClientPageController extends HttpController implements ClientAreaInterface
{
    public function execute($params = null)
    {
        $data             = parent::run($params);

        $templateType     = Router::getCurrentRoute()->is(Config::get('configuration.clientAreaController'), 'index') ? 'templatefile' : 'tabOverviewReplacementTemplate';
        $baseTemplateFile = 'resources/whmcs/clientarea';
        $templateFilePath = ModuleConstants::getModuleType() == 'addons' ? '../../../modules/addons/'.ModuleConstants::getModuleName().'/' . $baseTemplateFile : $baseTemplateFile;

        return [
            'pagetitle'    => Translator::get(Config::get('configuration.clientAreaName', ModuleConstants::getModuleName())),
            'breadcrumb'   => [],
            $templateType  => $templateFilePath,
            'requirelogin' => true,
            'forcessl'     => false,
            'vars'         => [
                'content' => \ModulesGarden\GGSModule\Core\Support\Facades\Smarty::view('clientarea', $data, ModuleConstants::getTemplateDir() . '/controllers')
            ]
        ];
    }

    protected function preResolveResponse()
    {
        if ($this->controllerResult instanceof View)
        {
            $this->controllerResult = new ServerModuleClientArea($this->controllerResult);
        }
    }
}
