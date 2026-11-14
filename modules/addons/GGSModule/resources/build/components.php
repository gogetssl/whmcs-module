<?php

use ModulesGarden\GGSModule\Core\Components\AssetsBuilder;
use ModulesGarden\GGSModule\Core\UI\View\JavaScriptLoader;

require_once dirname(__FILE__, 3) . '/vendor/autoload.php';

\ModulesGarden\GGSModule\Core\ModuleConstants::initialize();

header('Content-Type: application/javascript');

$builder          = new AssetsBuilder();
$javascriptLoader = new JavaScriptLoader();
$moduleName       = \ModulesGarden\GGSModule\Core\ModuleConstants::getModuleName();

echo "{" . PHP_EOL;
echo sprintf("const rootElements = %s.rootElements;", $moduleName) . PHP_EOL;
echo sprintf("const currentUrl = %s.currentUrl;", $moduleName) . PHP_EOL;
echo sprintf("const componentsUrl = %s.componentsUrl;", $moduleName) . PHP_EOL;
echo sprintf("const extraParams = %s.extraParams;", $moduleName) . PHP_EOL;
echo sprintf("const vueContainerId = %s.vueContainerId;", $moduleName) . PHP_EOL;
echo sprintf("const vueStoreData = %s.vueStoreData;", $moduleName) . PHP_EOL;

//define vueComponents variable for local Vue
echo "let vueComponents = {};" . PHP_EOL;

echo $javascriptLoader->generateImports();

echo $builder->build()->getHtmlContent();
echo $builder->build()->getJsContent();
echo PHP_EOL . "}";





