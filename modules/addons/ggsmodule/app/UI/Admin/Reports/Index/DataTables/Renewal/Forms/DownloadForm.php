<?php

namespace ModulesGarden\GGSModule\App\UI\Admin\Reports\Index\DataTables\Renewal\Forms;

use ModulesGarden\GGSModule\App\UI\Admin\Reports\Index\DataTables\Renewal\Providers\DownloadProvider;
use ModulesGarden\GGSModule\Components\Button\ButtonPrimary;
use ModulesGarden\GGSModule\Components\Button\ButtonSuccess;
use ModulesGarden\GGSModule\Components\Form\Form;
use ModulesGarden\GGSModule\Components\HiddenField\HiddenField;
use ModulesGarden\GGSModule\Core\Components\Actions\FormSubmit;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\GGSModule\Core\Support\Facades\Request;


class DownloadForm extends Form implements AdminAreaInterface, AjaxComponentInterface
{
    public function __construct()
    {
        parent::__construct();

        $this->provider       = DownloadProvider::class;
        $this->providerAction = DownloadProvider::ACTION_CREATE;
    }

    public function loadHtml(): void
    {
        $this->setId('renewalDownloadForm');
        $ajaxData = Request::get('ajaxData')?:[];

        foreach ($ajaxData as $key => $val)
        {
            $hiddenField = (new HiddenField())->setName($key)->setValue($val);
            $this->addElement($hiddenField);
        }

        $this->addElement((new ButtonSuccess())->setTitle($this->translate('downloadCsv'))->setIcon('file-document-outline')->onClick(new FormSubmit($this)));
    }
}