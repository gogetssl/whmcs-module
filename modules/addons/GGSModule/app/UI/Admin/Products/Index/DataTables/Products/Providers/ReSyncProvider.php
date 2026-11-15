<?php

namespace ModulesGarden\GGSModule\App\UI\Admin\Products\Index\DataTables\Products\Providers;

use ModulesGarden\GGSModule\App\Libs\Helpers;
use ModulesGarden\GGSModule\App\Models\RemoteProduct;
use ModulesGarden\GGSModule\App\Repositories\Whmcs\ProductRepository;
use ModulesGarden\GGSModule\Core\DataProviders\CrudProvider;
use ModulesGarden\GGSModule\Core\Support\Facades\Request;
use ModulesGarden\GGSModule\Core\WHMCS\Models\Pricing;
use ModulesGarden\GGSModule\Core\WHMCS\Models\Product;
use ModulesGarden\GGSModule\Packages\Product\Libs\ConfigurableOptions\Quantity;
use ModulesGarden\GGSModule\Packages\Product\Libs\ConfigurableOptions\SubOption\SubOption;
use ModulesGarden\GGSModule\Packages\Product\Services\ConfigurableOptions;

class ReSyncProvider extends CrudProvider
{
    public function read()
    {
        $this->data = $this->formData;
    }

    public function create()
    {
        Helpers::reSyncProducts(true);
    }
}