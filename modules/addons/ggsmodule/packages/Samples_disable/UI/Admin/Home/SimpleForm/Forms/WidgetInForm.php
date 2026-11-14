<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\Home\SimpleForm\Forms;

use ModulesGarden\GGSModule\Components\Button\ButtonSubmitSuccess;
use ModulesGarden\GGSModule\Components\Container\ContainerHalfPage;
use ModulesGarden\GGSModule\Components\Container\ContainerRow;
use ModulesGarden\GGSModule\Components\Dropdown\Dropdown;
use ModulesGarden\GGSModule\Components\Form\FormBuilder;
use ModulesGarden\GGSModule\Components\FormInputGroup\FormInputGroup;
use ModulesGarden\GGSModule\Components\FormInputGroupLabel\FormInputGroupLabel;
use ModulesGarden\GGSModule\Components\FormInputText;
use ModulesGarden\GGSModule\Components\ListInfo\ListInfo;
use ModulesGarden\GGSModule\Components\ListInfo\ListInfoItem;
use ModulesGarden\GGSModule\Components\Switcher\Switcher;
use ModulesGarden\GGSModule\Components\Widget\Widget;
use ModulesGarden\GGSModule\Core\Components\Actions\FormSubmit;


class WidgetInForm extends FormBuilder implements \ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface
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
