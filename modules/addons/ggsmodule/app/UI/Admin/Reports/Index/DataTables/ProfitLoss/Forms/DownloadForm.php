<?php

namespace ModulesGarden\ggsmodule\App\UI\Admin\Reports\Index\DataTables\ProfitLoss\Forms;

use ModulesGarden\ggsmodule\App\UI\Admin\Reports\Index\DataTables\ProfitLoss\Providers\DownloadProvider;
use ModulesGarden\ggsmodule\App\UI\Admin\Reports\Index\DataTables\ProfitLoss\Providers\FilterProvider;
use ModulesGarden\ggsmodule\Components\Button\Button;
use ModulesGarden\ggsmodule\Components\Button\ButtonPrimary;
use ModulesGarden\ggsmodule\Components\Button\ButtonSuccess;
use ModulesGarden\ggsmodule\Components\Dropdown\Dropdown;
use ModulesGarden\ggsmodule\Components\Form\Builder\BuilderCreator;
use ModulesGarden\ggsmodule\Components\Form\Form;
use ModulesGarden\ggsmodule\Components\HiddenField\HiddenField;
use ModulesGarden\ggsmodule\Components\Toolbar\Toolbar;
use ModulesGarden\ggsmodule\Core\Components\Actions\FormSubmit;
use ModulesGarden\ggsmodule\Core\Components\Actions\ReloadById;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\ggsmodule\Core\Support\Facades\Request;


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
        $this->setId('profitLossDownloadForm');
        $ajaxData = Request::get('ajaxData')?:[];

        foreach ($ajaxData as $key => $val)
        {
            $hiddenField = (new HiddenField())->setName($key)->setValue($val);
            $this->addElement($hiddenField);
        }

        $this->addElement((new ButtonSuccess())->setTitle($this->translate('downloadCsv'))->setIcon('file-document-outline')->onClick(new FormSubmit($this)));
    }
}