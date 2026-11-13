<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\Home\SimpleForm\Forms;

use ModulesGarden\ggsmodule\Components\Button\ButtonSubmitSuccess;
use ModulesGarden\ggsmodule\Components\Container\ContainerHalfPage;
use ModulesGarden\ggsmodule\Components\Container\ContainerRow;
use ModulesGarden\ggsmodule\Components\Dropdown\Dropdown;
use ModulesGarden\ggsmodule\Components\Form\FormBuilder;
use ModulesGarden\ggsmodule\Components\FormInputGroup\FormInputGroup;
use ModulesGarden\ggsmodule\Components\FormInputGroupLabel\FormInputGroupLabel;
use ModulesGarden\ggsmodule\Components\FormInputText;
use ModulesGarden\ggsmodule\Components\ListInfo\ListInfo;
use ModulesGarden\ggsmodule\Components\ListInfo\ListInfoItem;
use ModulesGarden\ggsmodule\Components\Switcher\Switcher;
use ModulesGarden\ggsmodule\Components\Widget\Widget;
use ModulesGarden\ggsmodule\Core\Components\Actions\FormSubmit;


class WidgetInForm extends FormBuilder implements \ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface
{
    public function loadHtml(): void
    {
        $firstSectionContainer  = (new Widget())->setTitle('First Container');
        $secondSectionContainer = (new Widget())->setTitle('First Container');
        $thirdSectionContainer  = (new Widget())->setTitle('Third Container');
        $thirdSectionContainer->addElement((new ListInfo())->setItems([
            new ListInfoItem('xxx', ' yyyyyy'),
            new ListInfoItem('zzzzz', 'yyyyyy')
        ]));

        $this->createField(FormInputText\FormInputText::class, 'dupa', $firstSectionContainer)
            ->createField(FormInputText\FormInputText::class, 'dupa2', $firstSectionContainer);

        $inputGrup = new FormInputGroup('sdadwdawdawd');
        $inputGrup->addElement((new FormInputText\FormInputText())->setName('X1234'));
        $inputGrup->addElement((new FormInputGroupLabel())->setText('@'));
        $inputGrup->addElement((new Dropdown())
            ->setName('dropdown2')
            ->setOptions([
                [
                    'value' => 1,
                    'name'  => 'XXXX',
                ],
                [
                    'value' => 2,
                    'name'  => 'YYYY',
                ],
            ]));

        $this->createField(FormInputText\FormInputText::class, 'dupa', $secondSectionContainer)
            ->createField(FormInputText\FormInputText::class, 'dupa2', $secondSectionContainer)
            ->createField(Switcher::class, 'switcher', $secondSectionContainer)
            ->addField($inputGrup, $secondSectionContainer);

        $row = new ContainerRow();
        $row->addElement((new ContainerHalfPage())->addElement($secondSectionContainer));
        $row->addElement((new ContainerHalfPage())->addElement($firstSectionContainer));
        $this->addElement($row);
        $this->addElement($thirdSectionContainer);

        // $this->restoreContainer()
        $this->addField((new ButtonSubmitSuccess())
            ->setTitle('Submit')
            ->onClick(new FormSubmit($this)));
    }
}
