<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\DataTable\Switchers;

use ModulesGarden\GGSModule\Components\Switcher\Switcher;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxOnActionInterface;
use ModulesGarden\GGSModule\Core\DataProviders\CrudProvider;
use WHMCS\User\Client;

class TaxExempt extends Switcher implements \ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface, AjaxOnActionInterface
{
    protected string $provider = \ModulesGarden\GGSModule\Packages\Samples\UI\Admin\DataTable\Providers\TaxExempt::class;
    protected string $providerAction = CrudProvider::ACTION_UPDATE;
}
