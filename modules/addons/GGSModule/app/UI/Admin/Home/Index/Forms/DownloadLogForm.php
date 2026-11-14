<?php

namespace ModulesGarden\GGSModule\App\UI\Admin\Home\Index\Forms;

use ModulesGarden\GGSModule\App\UI\Admin\Home\Index\Providers\DownloadLogProvider;
use ModulesGarden\GGSModule\Components\Form\Form;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxComponentInterface;


class DownloadLogForm extends Form implements AdminAreaInterface, AjaxComponentInterface
{
    public function __construct()
    {
        parent::__construct();

        $this->provider       = DownloadLogProvider::class;
        $this->providerAction = DownloadLogProvider::ACTION_CREATE;
    }

    public function loadHtml(): void
    {

    }
}