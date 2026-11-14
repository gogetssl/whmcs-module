<?php

namespace ModulesGarden\GGSModule\Packages\Product\UI\Providers;

use ModulesGarden\GGSModule\Core\DataProviders\CrudProvider;
use ModulesGarden\GGSModule\Core\Support\Facades\Request;
use ModulesGarden\GGSModule\Packages\Product\Helpers\ProductConfiguration as ProductConfigurationHelper;
use \ModulesGarden\GGSModule\Packages\Product\Services\ProductConfiguration as ProductConfigurationService;

class ProductConfiguration extends CrudProvider
{
    public function read()
    {
        $type = ProductConfigurationHelper::isRunAsProductAddon() ? ProductConfigurationService::PRODUCT_ADDON_TYPE : ProductConfigurationService::PRODUCT_TYPE;

        $data = (new ProductConfigurationService(Request::get('id', 0), $type))
            ->get();

        foreach ($data as $setting => $value)
        {
            $this->data[sprintf('customconfigoption[%s]', $setting)] = $value;

            if (is_array($value))
            {
                foreach ($value as $key => $subValue)
                {
                    $this->data[sprintf("customconfigoption[%s][{$key}]", $setting)] = $subValue;
                }
            }
        }
    }
}
