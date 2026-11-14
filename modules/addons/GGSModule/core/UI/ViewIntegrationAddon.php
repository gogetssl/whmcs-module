<?php

namespace ModulesGarden\GGSModule\Core\UI;

use ModulesGarden\GGSModule\Core\Support\Facades\Store;
use ModulesGarden\GGSModule\Core\UI\PageParams\ExtraParams;
use ModulesGarden\GGSModule\Core\Support\Facades\Messages;
use ModulesGarden\GGSModule\Core\Helper\BuildUrl;
use ModulesGarden\GGSModule\Core\Helper\RandomStringGenerator;
use ModulesGarden\GGSModule\Core\ModuleConstants;
use ModulesGarden\GGSModule\Core\UI\View\AlertsBuilder;

/**
 * Integration Addon View Controller
 */
class ViewIntegrationAddon extends View
{
    protected $integration = true;
    protected $template = 'integration';

    //@todo move it to views and controller
    public function getResponse()
    {
        try {
            return \ModulesGarden\GGSModule\Core\Support\Facades\Smarty::view($this->template, [
                'rootElements'    => json_encode([
                    'body'       => $this->buildRootElements($this->elements),
                    'alerts'     => (new AlertsBuilder())->create()
                ]),
                'currentUrl'      => BuildUrl::currentUrl(),
                'componentsUrl'   => BuildUrl::getComponentsURL(),
                'extraParams'     => json_encode(ExtraParams::getForCurrentAction()),
                'assetsURL'       => BuildUrl::getAssetsURL(),
                'customAssetsURL' => BuildUrl::getAssetsURL(true),
                'vueInstanceName' => (new RandomStringGenerator(32))->genRandomString(ModuleConstants::getModuleName()),
                'vueStoreData'    => json_encode(Store::toArray()),
                'moduleName'      => ModuleConstants::getModuleName(),
                'moduleVersion'   => \ModulesGarden\GGSModule\Core\Support\Facades\Config::get('configuration.version'),
                'integrationType' => 'integration',
            ], ModuleConstants::getTemplateDir() . '/controllers');
        }
        catch (\Exception $ex)
        {
            Messages::alert($ex->getMessage());

            return \ModulesGarden\GGSModule\Core\Support\Facades\Smarty::view($this->template, [
                'rootElements'    => json_encode([
                    'alerts' => (new \ModulesGarden\GGSModule\Core\UI\View\AlertsBuilder())->create()
                ]),
                'currentUrl'      => \ModulesGarden\GGSModule\Core\Helper\BuildUrl::currentUrl(),
                'componentsUrl'   => BuildUrl::getComponentsURL(),
                'extraParams'     => json_encode(ExtraParams::getForCurrentAction()),
                'assetsURL'       => BuildUrl::getAssetsURL(),
                'customAssetsURL' => BuildUrl::getAssetsURL(true),
                'vueInstanceName' => (new RandomStringGenerator(32))->genRandomString(ModuleConstants::getModuleName()),
                'vueStoreData'    => json_encode(Store::toArray()),
                'moduleName' => ModuleConstants::getModuleName(),
                'moduleVersion'   => \ModulesGarden\GGSModule\Core\Support\Facades\Config::get('configuration.version'),
            ], ModuleConstants::getTemplateDir() . '/controllers');
        }
    }
}
