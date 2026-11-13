<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\TreeView;

use ModulesGarden\ggsmodule\Components\AppNavBar\Breadcrumb;
use ModulesGarden\ggsmodule\Components\Button\ButtonSubmitSuccess;
use ModulesGarden\ggsmodule\Components\Button\ButtonSuccess;
use ModulesGarden\ggsmodule\Components\Form\Form;
use ModulesGarden\ggsmodule\Components\FormInputText\FormInputText;
use ModulesGarden\ggsmodule\Components\Toolbar\Toolbar;
use ModulesGarden\ggsmodule\Components\Widget\Widget;
use ModulesGarden\ggsmodule\Core\Components\Actions\FormSubmit;
use ModulesGarden\ggsmodule\Core\Components\Actions\ModalLoad;
use ModulesGarden\ggsmodule\Core\Components\Actions\PassAjaxData;
use ModulesGarden\ggsmodule\Core\Components\Actions\ReloadById;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\ggsmodule\Core\Contracts\Components\ClientAreaInterface;
use ModulesGarden\ggsmodule\Core\Storage\Resources;
use ModulesGarden\ggsmodule\Core\UI\Interfaces\ClientArea;
use ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\TreeView\CronTasks\CronTasks;
use ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\TreeView\Forms\AutoSaveForm;
use ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\TreeView\Forms\ReloadForm;
use ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\TreeView\Modal\Clients;
use ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\TreeView\Modals\Base;
use ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\TreeView\Modals\SwitchersModal;
use ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\TreeView\Overview\Overview;
use ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\TreeView\ServiceDetails\ServiceDetails;
use ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\TreeView\ServiceInformation\ServiceInformation;
use ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\TreeView\SubPages\DataTable\DataTable;
use ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\TreeView\Tabs\Tabs;
use ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\TreeView\Tiles\Tiles;
use ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\TreeView\TreeView\TreeView;

class Container extends \ModulesGarden\ggsmodule\Components\Container\Container implements AdminAreaInterface, ClientAreaInterface
{
    public function loadHtml(): void
    {
        $this->popup();
        $this->form();
        $this->buttons();


        $this->addElement(new TreeView());
    }

    protected function popup()
    {
        $button = new ButtonSuccess();
        $button->setTitle('Click Me!');
        $button->onClick(new ModalLoad( new \ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\TreeView\Modals\Clients()));

        $toolbar = new Toolbar();
        $toolbar->addElement($button);

        $widget = new Widget();
        $widget->setTitle('Popup field reload');
        $widget->addElement($toolbar);

        $this->addElement($widget);
    }

    protected function buttons()
    {
        $button = new ButtonSuccess();
        $button->setTitle('Reload datatable with Ajax Data');
        $button->onClick((new ReloadById('datatable'))->withParams([
            'dupa' => 'from-button'
        ]));

        $toolbar = new Toolbar();
        $toolbar->addElement($button);

        $widget = new Widget();
        $widget->setTitle('Control buttons');
        $widget->addElement($toolbar);

        $this->addElement($widget);
    }

    protected function form()
    {
        $input = new FormInputText();
        $input->setName('dupa');

        $form = new Form();
        $form->onSubmit((new PassAjaxData('datatable')));
        $form->onSubmit(new ReloadById('datatable'));
        $form->addElement($input);
        $form->addElement((new ButtonSubmitSuccess())->setTitle('Send Ajax Data And Reload')->onClick(new FormSubmit($form)));

        $widget = new Widget();
        $widget->addElement($form);

        $this->addElement($widget);
    }
}
