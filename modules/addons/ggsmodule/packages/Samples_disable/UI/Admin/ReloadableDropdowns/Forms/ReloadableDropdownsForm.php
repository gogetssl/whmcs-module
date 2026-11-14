<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\ReloadableDropdowns\Forms;

use ModulesGarden\GGSModule\Components\Dropdown\Dropdown;
use ModulesGarden\GGSModule\Components\Form\AbstractForm;
use ModulesGarden\GGSModule\Components\Form\Builder\BuilderCreator;
use ModulesGarden\GGSModule\Components\Row\Row;
use ModulesGarden\GGSModule\Components\Widget\Widget;
use ModulesGarden\GGSModule\Core\Components\Actions\PassAjaxData;
use ModulesGarden\GGSModule\Core\Components\Actions\ReloadById;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\ReloadableDropdowns\Fields\SomeDropdown;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\ReloadableDropdowns\Providers\ReloadableDropdownsProvider;

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