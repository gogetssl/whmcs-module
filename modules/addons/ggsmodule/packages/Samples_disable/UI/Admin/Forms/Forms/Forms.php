<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\Forms\Forms;

use ModulesGarden\ggsmodule\Components\Button\ButtonSubmitSuccess;
use ModulesGarden\ggsmodule\Components\Widget\Widget;
use ModulesGarden\ggsmodule\Core\Components\Actions\FormSubmit;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\Forms\Forms\Forms\AutoSubmit;

class Forms extends \ModulesGarden\ggsmodule\Components\Container\Container implements AdminAreaInterface
{
    public function loadHtml(): void
    {

        $this->form1();
        $this->form2();
        $this->form3();
        $this->form4();
    }

    public function form1()
    {
        $form   = new \ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\Forms\Forms\Forms\FormOneColumnElements();
        $widget = new Widget();
        $widget->setTitle('Form One Column');
        $widget->addElement($form);
        $widget->addElement((new ButtonSubmitSuccess())
            ->setTitle('Submit')
            ->onClick(new FormSubmit($form)));

        $this->addElement($widget);
    }

    public function form2()
    {
        $form   = new \ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\Forms\Forms\Forms\FormTwoColumnsElements();
        $widget = new Widget();
        $widget->setTitle('Form Two Columns');
        $widget->addElement($form);
        $widget->addElement((new ButtonSubmitSuccess())
            ->setTitle('Submit')
            ->onClick(new FormSubmit($form)));

        $this->addElement($widget);
    }

    public function form3()
    {
        $form   = new \ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\Forms\Forms\Forms\FormWithTabsElements();
        $widget = new Widget();
        $widget->setTitle('Form With Non Form Elements');
        $widget->addElement($form);
        $widget->addElement((new ButtonSubmitSuccess())
            ->setTitle('Submit')
            ->onClick(new FormSubmit($form)));

        $this->addElement($widget);
    }

    public function form4()
    {
        $form   = new AutoSubmit();
        $widget = new Widget();
        $widget->setTitle('Auto submit row form');
        $widget->addElement($form);
        $widget->addElement((new ButtonSubmitSuccess())
            ->setTitle('Submit')
            ->onClick(new FormSubmit($form)));

        $this->addElement($widget);

    }
}
