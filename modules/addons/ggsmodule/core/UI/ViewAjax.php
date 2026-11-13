<?php

namespace ModulesGarden\ggsmodule\Core\UI;

use ModulesGarden\ggsmodule\Core\Components\DataBuilder;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\ggsmodule\Core\Contracts\Components\ClientAreaInterface;
use ModulesGarden\ggsmodule\Core\Contracts\Components\ComponentInterface;
use ModulesGarden\ggsmodule\Core\Contracts\ResponseInterface;
use ModulesGarden\ggsmodule\Core\DependencyInjection;
use ModulesGarden\ggsmodule\Core\Helper;
use ModulesGarden\ggsmodule\Core\Http\JsonResponse;
use function ModulesGarden\ggsmodule\Core\Helper\isAdmin;
use function ModulesGarden\ggsmodule\Core\make;

/**
 * Main Vuew Controler
 */
class ViewAjax extends AbstractPartialView
{
    public function addElement($element): self
    {
        if (is_string($element))
        {
            $element = DependencyInjection::create($element);
        }

        $this->validateInterface($element);

        $this->elements[] = $element;

        return $this;
    }

    /**
     * @return mixed
     * @todo - fix loading!
     */
    public function getResponse()
    {
        $namespace = Helper\ModuleNamespace::convertStringToNamespace(\ModulesGarden\ggsmodule\Core\Support\Facades\Request::get('namespace'));
        if (!Helper\ModuleNamespace::isInRootNamespace($namespace))
        {
            return null;
        }

        if (!in_array(AjaxComponentInterface::class, class_implements($namespace) ?? []))
        {
            throw new \Exception('Class ' . $namespace . ' must implements ' . AjaxComponentInterface::class);
        }

        $component = make($namespace);
        $this->validateInterface($component);
        
        $response = (new DataBuilder($component))->returnAjaxData();

        if ($response instanceof \Symfony\Component\HttpFoundation\Response)
        {
            $response->send();
            exit;
        }

        if ($response instanceof ResponseInterface)
        {
            return new JsonResponse($response->toArray());
        }

        return $response;
    }

    protected function validateInterface($element)
    {
        if (!$element instanceof ComponentInterface)
        {
            throw new \Exception('Class ' . get_class($element) . ' must implements ' . ComponentInterface::class);
        }

        if (isAdmin() && !$element instanceof AdminAreaInterface)
        {
            throw new \Exception('Component ' . get_class($element) . ' does not implement ' . AdminAreaInterface::class);
        }

        if (!isAdmin() && !$element instanceof ClientAreaInterface)
        {
            throw new \Exception('Component ' . get_class($element) . ' does not implement ' . ClientAreaInterface::class);
        }
    }
}

