<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\HintsBox\Forms;

use ModulesGarden\ggsmodule\Components\Form\AbstractForm;
use ModulesGarden\ggsmodule\Components\Form\Builder\BuilderCreator;
use ModulesGarden\ggsmodule\Components\Switcher\Switcher;
use ModulesGarden\ggsmodule\Components\Widget\Widget;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\HintsBox\Providers\SettingsProvider;

class SettingsForm extends AbstractForm implements AdminAreaInterface
{
    protected string $provider = SettingsProvider::class;
    protected string $providerAction = SettingsProvider::ACTION_UPDATE;

    public function __construct()
    {
        parent::__construct();

        $widget = new Widget();
        $this->addElement($widget);

        $this->builder = BuilderCreator::twoColumnsInContainer($this, $widget);
        $this->builder->createSubmitButton();
    }

    public function loadHtml(): void
    {
        $this->builder->createField(Switcher::class, 'hideGuide', true);
    }
}