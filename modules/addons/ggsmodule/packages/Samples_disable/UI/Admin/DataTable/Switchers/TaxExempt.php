<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\DataTable\Switchers;

use ModulesGarden\ggsmodule\Components\Switcher\Switcher;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AjaxOnActionInterface;
use ModulesGarden\ggsmodule\Core\DataProviders\CrudProvider;
use WHMCS\User\Client;

class TaxExempt extends Switcher implements \ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface, AjaxOnActionInterface
{
    protected string $provider = \ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\DataTable\Providers\TaxExempt::class;
    protected string $providerAction = CrudProvider::ACTION_UPDATE;
}
