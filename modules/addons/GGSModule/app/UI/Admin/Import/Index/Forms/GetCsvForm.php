<?php

namespace ModulesGarden\GGSModule\App\UI\Admin\Import\Index\Forms;


use ModulesGarden\GGSModule\App\UI\Admin\Import\Index\Providers\GetCsvProvider;
use ModulesGarden\GGSModule\Components\Form\Form;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxComponentInterface;


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