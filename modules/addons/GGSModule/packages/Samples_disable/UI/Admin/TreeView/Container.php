<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\TreeView;

use ModulesGarden\GGSModule\Components\AppNavBar\Breadcrumb;
use ModulesGarden\GGSModule\Components\Button\ButtonSubmitSuccess;
use ModulesGarden\GGSModule\Components\Button\ButtonSuccess;
use ModulesGarden\GGSModule\Components\Form\Form;
use ModulesGarden\GGSModule\Components\FormInputText\FormInputText;
use ModulesGarden\GGSModule\Components\Toolbar\Toolbar;
use ModulesGarden\GGSModule\Components\Widget\Widget;
use ModulesGarden\GGSModule\Core\Components\Actions\FormSubmit;
use ModulesGarden\GGSModule\Core\Components\Actions\ModalLoad;
use ModulesGarden\GGSModule\Core\Components\Actions\PassAjaxData;
use ModulesGarden\GGSModule\Core\Components\Actions\ReloadById;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\ClientAreaInterface;
use ModulesGarden\GGSModule\Core\Storage\Resources;
use ModulesGarden\GGSModule\Core\UI\Interfaces\ClientArea;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\TreeView\CronTasks\CronTasks;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\TreeView\Forms\AutoSaveForm;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\TreeView\Forms\ReloadForm;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\TreeView\Modal\Clients;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\TreeView\Modals\Base;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\TreeView\Modals\SwitchersModal;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\TreeView\Overview\Overview;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\TreeView\ServiceDetails\ServiceDetails;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\TreeView\ServiceInformation\ServiceInformation;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\TreeView\SubPages\DataTable\DataTable;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\TreeView\Tabs\Tabs;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\TreeView\Tiles\Tiles;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\TreeView\TreeView\TreeView;

class Container extends \ModulesGarden\GGSModule\Components\Container\Container implements AdminAreaInterface, ClientAreaInterface
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
        $button->onClick(new ModalLoad( new \ModulesGarden\GGSModule\Packages\Samples\UI\Admin\TreeView\Modals\Clients()));

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
