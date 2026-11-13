<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\ComponentActions\DownloadFile\Forms;

use ModulesGarden\ggsmodule\Components\Button\ButtonSubmitSuccess;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\ComponentActions\DownloadFile\Providers\Provider;

class Form extends \ModulesGarden\ggsmodule\Components\Form\Form implements AdminAreaInterface, AjaxComponentInterface
{
    protected string $provider = Provider::class;
}