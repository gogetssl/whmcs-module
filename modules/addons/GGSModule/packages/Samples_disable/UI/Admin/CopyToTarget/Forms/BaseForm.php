<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\CopyToTarget\Forms;

use ModulesGarden\GGSModule\Components\Container\Container;
use ModulesGarden\GGSModule\Components\CopyTextInline\CopyTextInline;
use ModulesGarden\GGSModule\Components\Form\Builder\BuilderCreator;
use ModulesGarden\GGSModule\Components\Form\Form;
use ModulesGarden\GGSModule\Components\FormInputText\FormInputText;
use ModulesGarden\GGSModule\Components\Label\Label;
use ModulesGarden\GGSModule\Components\ListSimple\ListSimple;
use ModulesGarden\GGSModule\Components\Text\Text;
use ModulesGarden\GGSModule\Components\TextArea\TextArea;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxComponentInterface;

class BaseForm extends Form implements AjaxComponentInterface, AdminAreaInterface
{
    public function __construct()
    {
        parent::__construct();

        $this->builder = BuilderCreator::oneColumnHalfPage($this);
    }

    public function loadHtml(): void
    {
        $textInput = $this->builder->createField(FormInputText::class, 'subject');
        $targetArea = $this->builder->createField(TextArea::class, 'contentTextArea');

        $listSimple1 = new ListSimple();

        $buttons = [
            '{$client_firstname}',
            '{$client_lastname}',
            '{$client_company}'
        ];

        $label1 = new Label();
        $label1->setText("Kopiuje tylko do Subjectu");

        $this->builder->addElement($label1);

        foreach ($buttons as $button)
        {
            $copyComponent = new CopyTextInline();
            $copyComponent->setName('copy');
            $copyComponent->setText($button);
            $copyComponent->setTargetComponent($textInput);
            $copyComponent->hideIcon();
            $listSimple1->addElement($copyComponent);
        }

        $this->builder->addElement($listSimple1);

        $label2 = new Label();
        $label2->setText("Kopiuje tylko do Contentu (textarea)");

        $this->builder->addElement($label2);

        $listSimple2 = new ListSimple();

        foreach ($buttons as $button)
        {
            $copyComponent = new CopyTextInline();
            $copyComponent->setName('copy');
            $copyComponent->setText($button);
            $copyComponent->setTargetComponentName('contentTextArea');
            $copyComponent->hideIcon();
            $listSimple2->addElement($copyComponent);
        }

        $this->builder->addElement($listSimple2);

        $label3 = new Label();
        $label3->setText("Kopiuje gdziekolwiek jest kursor");

        $this->builder->addElement($label3);

        $listSimple3 = new ListSimple();

        foreach ($buttons as $button)
        {
            $copyComponent = new CopyTextInline();
            $copyComponent->setName('copy');
            $copyComponent->setText($button);
            $copyComponent->setTargetFocused();
            $copyComponent->hideIcon();
            $listSimple3->addElement($copyComponent);
        }

        $this->builder->addElement($listSimple3);
    }
}