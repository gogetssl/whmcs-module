<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\Forms\Pages;

use ModulesGarden\ggsmodule\Components\Form\AbstractFormConfigOptions;
use ModulesGarden\ggsmodule\Components\FormInputText\FormInputText;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\Forms\Forms\FormWithTabsElements;

class ConfigOptions extends AbstractFormConfigOptions implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->builder->createField(FormInputText::class, 'customconfigoption[text]');
    }
}
