<?php

namespace ModulesGarden\ggsmodule\Packages\Product\UI\Forms;

use ModulesGarden\ggsmodule\Components\Container\Container;
use ModulesGarden\ggsmodule\Components\Container\ContainerColumn;
use ModulesGarden\ggsmodule\Components\Form\Builder\BuilderCreator;
use ModulesGarden\ggsmodule\Components\Form\Form;
use ModulesGarden\ggsmodule\Components\Row\Row;
use ModulesGarden\ggsmodule\Components\Switcher\Switcher;
use ModulesGarden\ggsmodule\Components\Widget\Widget;
use ModulesGarden\ggsmodule\Core\Components\Decorator\Decorator;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\ggsmodule\Core\Support\Facades\Config;
use ModulesGarden\ggsmodule\Core\Support\Facades\Request;
use ModulesGarden\ggsmodule\Packages\Product\Enums\ConfigSettings;
use ModulesGarden\ggsmodule\Packages\Product\Libs\ConfigurableOptions\AbstractConfigurableOption;
use ModulesGarden\ggsmodule\Packages\Product\Libs\ConfigurableOptionsGroups\ConfigurableOptionsGroup;
use ModulesGarden\ggsmodule\Packages\Product\UI\Builders\ConfigurableOptionsBuilder;

class CreateConfigurableOptions extends Form implements AdminAreaInterface, AjaxComponentInterface
{
    protected string $provider = \ModulesGarden\ggsmodule\Packages\Product\UI\Providers\CreateConfigurableOptions::class;

    public function __construct()
    {
        parent::__construct();

        $this->builder = BuilderCreator::simple($this);
    }

    public function loadHtml(): void
    {
        //@todo move this to provider
        $configurableOptions = is_callable(Config::get(ConfigSettings::CONFIG_OPTIONS_LOADER)) ? Config::get(ConfigSettings::CONFIG_OPTIONS_LOADER)(Request::get('id')) : Config::get(ConfigSettings::CONFIG_OPTIONS);

        $row = new Row();

        foreach ($configurableOptions as $configOption)
        {
            $element = $configOption instanceof ConfigurableOptionsGroup ? $this->buildGroup($configOption) : $this->buildSinlge($configOption);

            $containerClass = Config::get(ConfigSettings::CONFIG_OPTIONS_CONTAINER, ContainerColumn::class);
            $container      = new $containerClass();

            $container->addElement($element);

            if ($configOption instanceof ConfigurableOptionsGroup)
            {
                (new Decorator($container))
                    ->childrenSize()
                    ->fitToParent();
            }

            $row->addElement($container);
        }

        $this->addElement($row);
    }

    protected function generateSwitcher(AbstractConfigurableOption $configOption): Switcher
    {
        $switcher = new Switcher();
        $switcher->setName($configOption->getName());
        $switcher->setTitle($configOption->getFullName());
        $switcher->setDefaultValue(true);

        return $switcher;
    }

    protected function buildSinlge(AbstractConfigurableOption $configOption)
    {
        $section = new Container();

        (new ConfigurableOptionsBuilder($this))->addFieldInContainer($section, $this->generateSwitcher($configOption));

        $section->addClass('lu-m-r-2x');
        $section->addClass('lu-m-l-2x');

        return $section;
    }

    protected function buildGroup(ConfigurableOptionsGroup $configOptionGroup)
    {
        $section = new Widget();
        $section->setTitle($this->translate($configOptionGroup->getName()));

        foreach ($configOptionGroup->getOptions() as $configOptionInGroup)
        {
            (new ConfigurableOptionsBuilder($this))->addFieldInContainer($section, $this->generateSwitcher($configOptionInGroup));
        }

        return $section;
    }

}