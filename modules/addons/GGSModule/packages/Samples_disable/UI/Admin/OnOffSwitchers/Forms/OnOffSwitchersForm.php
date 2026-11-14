<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\OnOffSwitchers\Forms;

use ModulesGarden\GGSModule\Components\Form\AbstractForm;
use ModulesGarden\GGSModule\Components\Form\Builder\BuilderCreator;
use ModulesGarden\GGSModule\Components\Switcher\Switcher;
use ModulesGarden\GGSModule\Components\Widget\Widget;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\OnOffSwitchers\Providers\OnOffSwitchersProviders;

class OnOffSwitchersForm extends AbstractForm implements AjaxComponentInterface, AdminAreaInterface
{
    protected string $provider = OnOffSwitchersProviders::class;
    protected string $providerAction = OnOffSwitchersProviders::ACTION_UPDATE;

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
        $this->builder->createField(Switcher::class, 'switcherOnOff', true)
            ->setDefaultValue(Switcher::STATE_ON)
            ->setOnOffMode();
    }
}