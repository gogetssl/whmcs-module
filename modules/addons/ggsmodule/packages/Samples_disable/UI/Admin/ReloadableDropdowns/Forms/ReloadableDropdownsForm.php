<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\ReloadableDropdowns\Forms;

use ModulesGarden\ggsmodule\Components\Dropdown\Dropdown;
use ModulesGarden\ggsmodule\Components\Form\AbstractForm;
use ModulesGarden\ggsmodule\Components\Form\Builder\BuilderCreator;
use ModulesGarden\ggsmodule\Components\Row\Row;
use ModulesGarden\ggsmodule\Components\Widget\Widget;
use ModulesGarden\ggsmodule\Core\Components\Actions\PassAjaxData;
use ModulesGarden\ggsmodule\Core\Components\Actions\ReloadById;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\ReloadableDropdowns\Fields\SomeDropdown;
use ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\ReloadableDropdowns\Providers\ReloadableDropdownsProvider;

class ReloadableDropdownsForm extends AbstractForm implements AdminAreaInterface
{
    protected string $provider = ReloadableDropdownsProvider::class;
    protected string $providerAction = ReloadableDropdownsProvider::ACTION_UPDATE;

    public function __construct()
    {
        parent::__construct();

        $this->builder = BuilderCreator::twoColumns($this);
    }

    public function loadHtml(): void
    {
        $this->builder->createField(Dropdown::class, 'masterDropdown')
            ->setDefaultValueAsFirstOption()
            ->onChange(new PassAjaxData('slaveDropdown'))
            ->onChange(new ReloadById('slaveDropdown'));
        $this->builder->addElement((new Row()));
        $this->builder->createField(SomeDropdown::class, 'slaveDropdown');
    }
}