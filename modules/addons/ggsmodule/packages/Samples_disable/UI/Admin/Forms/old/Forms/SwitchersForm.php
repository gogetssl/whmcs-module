<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\ComplexElements\Forms;

use ModulesGarden\ggsmodule\Components\Alert\AlertInfo;
use ModulesGarden\ggsmodule\Components\Dropdown\Dropdown;
use ModulesGarden\ggsmodule\Components\Switcher\Switcher;
use ModulesGarden\ggsmodule\Components\TableSimple\Record\Record;
use ModulesGarden\ggsmodule\Components\TableSimple\TableSimple;
use ModulesGarden\ggsmodule\Components\Widget\Widget;
use ModulesGarden\ggsmodule\Core\Components\Actions\Reload;

class SwitchersForm extends \ModulesGarden\ggsmodule\Components\Form\Form
{
    public function loadHtml(): void
    {
        $dropDownOptions = ['option 1', 'option 2', 'option 3'];

        $alert = new AlertInfo();
        $alert->setText('Please use dropdown to reload form.  And note that switcher in widget loosing current state every reload form');

        $this->builder->createField(Dropdown::class, 'reloadDropdown', false)
            ->setDefaultValueAsFirstOption()->setOptions($dropDownOptions)->onChange(new Reload($this));

        $checkBoxField = new Switcher();
        $checkBoxField->setId('freeSwitcher');
        $checkBoxField->setName('freeSwitcher');

        $this->builder->addField($checkBoxField);

        $table = new TableSimple();
        $table->setId('someWeirdId');
        $table->setTextCentered();

        $table->addRecord(new Record([
            '',
            "<strong>Name</strong>",
            "<strong>Price</strong>",
        ]));


        $switcherField = new Switcher();
        $switcherField->setId("widgetSwitcher");
        $switcherField->setName("widgetSwitcher");

        $table->addRecord(new Record([
            $switcherField,
            "name",
            "100 zł"
        ]));

        $widget = new Widget();
        $widget->addElement($table);
        $widget->setTitle("Some Widget");
        $this->addElement($alert);
        $this->addElement($widget);
    }
}