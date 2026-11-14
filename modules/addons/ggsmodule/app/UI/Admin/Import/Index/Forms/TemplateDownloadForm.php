<?php

namespace ModulesGarden\GGSModule\App\UI\Admin\Import\Index\Forms;

use ModulesGarden\GGSModule\App\UI\Admin\Import\Index\Providers\ImportProvider;
use ModulesGarden\GGSModule\App\UI\Admin\Import\Index\Providers\TemplateDownloadProvider;
use ModulesGarden\GGSModule\App\UI\Admin\Reports\Index\DataTables\ProfitLoss\Providers\FilterProvider;
use ModulesGarden\GGSModule\Components\Button\ButtonPrimary;
use ModulesGarden\GGSModule\Components\Button\ButtonSuccess;
use ModulesGarden\GGSModule\Components\DatePicker\DatePicker;
use ModulesGarden\GGSModule\Components\Dropdown\Dropdown;
use ModulesGarden\GGSModule\Components\Form\Builder\BuilderCreator;
use ModulesGarden\GGSModule\Components\Form\Form;
use ModulesGarden\GGSModule\Components\FormInputText\FormInputText;
use ModulesGarden\GGSModule\Components\HiddenField\HiddenField;
use ModulesGarden\GGSModule\Components\Switcher\Switcher;
use ModulesGarden\GGSModule\Components\Toolbar\Toolbar;
use ModulesGarden\GGSModule\Core\Components\Actions\DownloadFileFromForm;
use ModulesGarden\GGSModule\Core\Components\Actions\FormSubmit;
use ModulesGarden\GGSModule\Core\Components\Actions\ReloadById;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxComponentInterface;


class TemplateDownloadForm extends Form implements AdminAreaInterface, AjaxComponentInterface
{
    public function __construct()
    {
        parent::__construct();

        $this->provider       = TemplateDownloadProvider::class;
        $this->providerAction = TemplateDownloadProvider::ACTION_CREATE;
    }

    public function loadHtml(): void
    {
        $this->builder = BuilderCreator::oneColumn($this);
        $this->setId('TemplateDownloadForm');
        $toolbar = new Toolbar();

        $toolbar->addElement(
            (new ButtonSuccess())
                ->setTitle($this->translate('download'))
                ->setIcon('file-document-outline')
                ->onClick(
                    new FormSubmit($this)
                )
        );

        $this->addElement($toolbar);
    }
}