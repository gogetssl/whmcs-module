<?php

namespace ModulesGarden\ggsmodule\App\UI\Admin\Reports\Index\DataTables\DatewiseSales\Forms;

use ModulesGarden\ggsmodule\App\UI\Admin\Reports\Index\DataTables\DatewiseSales\Providers\GetCsvProvider;
use ModulesGarden\ggsmodule\App\UI\Admin\Reports\Index\DataTables\DatewiseSales\Providers\FilterProvider;
use ModulesGarden\ggsmodule\Components\Button\ButtonPrimary;
use ModulesGarden\ggsmodule\Components\Dropdown\Dropdown;
use ModulesGarden\ggsmodule\Components\Form\Builder\BuilderCreator;
use ModulesGarden\ggsmodule\Components\Form\Form;
use ModulesGarden\ggsmodule\Components\Toolbar\Toolbar;
use ModulesGarden\ggsmodule\Core\Components\Actions\ReloadById;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AjaxComponentInterface;


class GetCsvForm extends Form implements AdminAreaInterface, AjaxComponentInterface
{
    public function __construct()
    {
        parent::__construct();

        $this->provider       = GetCsvProvider::class;
        $this->providerAction = GetCsvProvider::ACTION_CREATE;
    }

    public function loadHtml(): void
    {

    }
}