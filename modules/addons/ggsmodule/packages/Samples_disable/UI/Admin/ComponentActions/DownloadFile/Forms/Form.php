<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\ComponentActions\DownloadFile\Forms;

use ModulesGarden\GGSModule\Components\Button\ButtonSubmitSuccess;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\ComponentActions\DownloadFile\Providers\Provider;

class Form extends \ModulesGarden\GGSModule\Components\Form\Form implements AdminAreaInterface, AjaxComponentInterface
{
    protected string $provider = Provider::class;
}