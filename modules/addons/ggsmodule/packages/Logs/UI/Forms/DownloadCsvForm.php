<?php

namespace ModulesGarden\GGSModule\Packages\Logs\UI\Forms;

use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\GGSModule\Components\Form\Form;
use ModulesGarden\GGSModule\Packages\Logs\UI\Providers\DownloadCsvProvider;

class DownloadCsvForm extends Form implements AdminAreaInterface, AjaxComponentInterface
{
    protected string $provider = DownloadCsvProvider::class;
}