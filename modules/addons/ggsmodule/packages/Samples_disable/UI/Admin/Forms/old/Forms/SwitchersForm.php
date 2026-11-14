<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\ComplexElements\Forms;

use ModulesGarden\GGSModule\Components\Alert\AlertInfo;
use ModulesGarden\GGSModule\Components\Dropdown\Dropdown;
use ModulesGarden\GGSModule\Components\Switcher\Switcher;
use ModulesGarden\GGSModule\Components\TableSimple\Record\Record;
use ModulesGarden\GGSModule\Components\TableSimple\TableSimple;
use ModulesGarden\GGSModule\Components\Widget\Widget;
use ModulesGarden\GGSModule\Core\Components\Actions\Reload;

class SwitchersForm extends \ModulesGarden\GGSModule\Components\Form\Form
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