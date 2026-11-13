<?php

namespace ModulesGarden\ggsmodule\App\UI\Admin\Products\Index\DataTables\Products\Providers;

use ModulesGarden\ggsmodule\App\Libs\Helpers;
use ModulesGarden\ggsmodule\App\Models\RemoteProduct;
use ModulesGarden\ggsmodule\App\Repositories\Whmcs\ProductRepository;
use ModulesGarden\ggsmodule\Core\DataProviders\CrudProvider;
use ModulesGarden\ggsmodule\Core\Support\Facades\Request;
use ModulesGarden\ggsmodule\Core\WHMCS\Models\Pricing;
use ModulesGarden\ggsmodule\Core\WHMCS\Models\Product;
use ModulesGarden\ggsmodule\Packages\Product\Libs\ConfigurableOptions\Quantity;
use ModulesGarden\ggsmodule\Packages\Product\Libs\ConfigurableOptions\SubOption\SubOption;
use ModulesGarden\ggsmodule\Packages\Product\Services\ConfigurableOptions;

class ReSyncProvider extends CrudProvider
{
    public function read()
    {
        $this->data = $this->formData;
    }

    public function create()
    {
        Helpers::reSyncProducts();
    }
}