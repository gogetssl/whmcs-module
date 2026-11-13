<?php

namespace ModulesGarden\ggsmodule\Core\App\Controllers\Instances\Http;

use ModulesGarden\ggsmodule\App\Hooks\InternalHooks\PreClientAreaPageLoad;
use ModulesGarden\ggsmodule\Core\App\Controllers\Instances\HttpController;
use ModulesGarden\ggsmodule\Core\Contracts\Controllers\ClientAreaInterface;
use ModulesGarden\ggsmodule\Core\ModuleConstants;
use ModulesGarden\ggsmodule\Core\Routing\Url;
use ModulesGarden\ggsmodule\Core\Support\Facades\Breadcrumbs;
use ModulesGarden\ggsmodule\Core\Support\Facades\Config;
use ModulesGarden\ggsmodule\Core\Support\Facades\Translator;
use ModulesGarden\ggsmodule\Core\UI\View;
use ModulesGarden\ggsmodule\Core\UI\Views\AddonModuleClientArea;

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
                'content' => \ModulesGarden\ggsmodule\Core\Support\Facades\Smarty::view('clientarea', $vars, ModuleConstants::getTemplateDir() . '/controllers')
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
