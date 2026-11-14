<?php

namespace ModulesGarden\GGSModule\Core\UI;

use Exception;
use ModulesGarden\GGSModule\Core\Components\DataBuilder;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\ClientAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\ComponentInterface;
use ModulesGarden\GGSModule\Core\DependencyInjection;
use ModulesGarden\GGSModule\Core\UI\Helpers\TemplateConstants;
use function ModulesGarden\GGSModule\Core\Helper\isAdmin;

abstract class AbstractPartialView
{
    protected array $elements = [];

    /**
     * @param $element
     * @return $this
     * @throws Exception
     * @todo - refactor me
     */
    public function addElement($element): self
    {
        if (is_string($element))
        {
            $element = DependencyInjection::create($element);
        }

        if (!$element instanceof ComponentInterface)
        {
            throw new Exception('Class ' . get_class($element) . ' must implements ' . ComponentInterface::class);
        }

        $this->elements[] = $element;

        return $this;
    }


    public function getElements()
    {
        return $this->elements;
    }

    protected function buildRootElements(array $rootElements)
    {
        return array_map(function($element) {
            return (new DataBuilder($element))
                ->withHtml()
                ->toArray();
        }, $rootElements);
    }
}