<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\Forms\Pages;

use ModulesGarden\GGSModule\Components\Form\AbstractFormConfigOptions;
use ModulesGarden\GGSModule\Components\FormInputText\FormInputText;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\Forms\Forms\FormWithTabsElements;

class ConfigOptions extends AbstractFormConfigOptions implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->builder->createField(FormInputText::class, 'customconfigoption[text]');
    }
}
