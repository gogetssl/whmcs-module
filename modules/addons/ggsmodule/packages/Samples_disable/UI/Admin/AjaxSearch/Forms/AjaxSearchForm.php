<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\AjaxSearch\Forms;

use ModulesGarden\ggsmodule\Components\Form\AbstractForm;
use ModulesGarden\ggsmodule\Components\Form\Builder\BuilderCreator;
use ModulesGarden\ggsmodule\Components\Widget\Widget;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\AjaxSearch\Fields\ClientsSearchField;
use ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\AjaxSearch\Providers\AjaxSearchProvider;

class AjaxSearchForm extends AbstractForm implements AdminAreaInterface
{
    protected string $provider = AjaxSearchProvider::class;
    protected string $providerAction = AjaxSearchProvider::ACTION_UPDATE;

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
        $this->builder->addField((new ClientsSearchField()));
    }
}