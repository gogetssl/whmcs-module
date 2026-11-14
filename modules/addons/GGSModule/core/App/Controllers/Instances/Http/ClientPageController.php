<?php

namespace ModulesGarden\GGSModule\Core\App\Controllers\Instances\Http;

use ModulesGarden\GGSModule\App\Hooks\InternalHooks\PreClientAreaPageLoad;
use ModulesGarden\GGSModule\Core\App\Controllers\Instances\HttpController;
use ModulesGarden\GGSModule\Core\Contracts\Controllers\ClientAreaInterface;
use ModulesGarden\GGSModule\Core\ModuleConstants;
use ModulesGarden\GGSModule\Core\Routing\Url;
use ModulesGarden\GGSModule\Core\Support\Facades\Breadcrumbs;
use ModulesGarden\GGSModule\Core\Support\Facades\Config;
use ModulesGarden\GGSModule\Core\Support\Facades\Translator;
use ModulesGarden\GGSModule\Core\UI\View;
use ModulesGarden\GGSModule\Core\UI\Views\AddonModuleClientArea;

class ClientPageController extends HttpController implements ClientAreaInterface
{
    public function execute($params = null)
    {
        $vars = parent::run($params);

        return [
            'pagetitle'    => Translator::get(Config::get('configuration.clientAreaName', ModuleConstants::getModuleName())),
            'breadcrumb'   => $this->getBreadcrumbs(),
            'templatefile' => 'resources/whmcs/clientarea',
            'requirelogin' => true,
            'forcessl'     => false,
            'vars'         => [
                'content' => \ModulesGarden\GGSModule\Core\Support\Facades\Smarty::view('clientarea', $vars, ModuleConstants::getTemplateDir() . '/controllers')
            ]
        ];
    }

    protected function preResolveResponse()
    {
        if ($this->controllerResult instanceof View)
        {
            $this->controllerResult = new AddonModuleClientArea($this->controllerResult);
        }
    }

    protected function getBreadcrumbs(): array
    {
        $breadcrumbs = [
            Url::route() => Translator::get(Config::get('configuration.clientAreaName'))
        ];

        foreach (Breadcrumbs::get() as $breadcrumb)
        {
            $breadcrumbs[$breadcrumb->getUrl()] = Translator::get($breadcrumb->getName());
        }

        return $breadcrumbs;
    }
}
