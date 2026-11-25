<?php

namespace GGSModule\App\Libs\Products\ConfigOptions;

use GGSModule\App\Kernel\Lang;
use GGSModule\App\Libs\Support\Edition;
use GGSModule\App\Models\Whmcs\Product;
use GGSModule\App\Models\Whmcs\ProductConfigGroup;
use GGSModule\App\Models\Whmcs\ProductConfigLink;

/** The configurable options group of a WHMCS product: the one it has, or a new one named after the product */
class ConfigurableOptionsGroup
{
    public function getFirstOrCreateRelated(Product $product): ProductConfigGroup
    {
        $group = ProductConfigGroup::ofProductId($product->id)->first();
        if($group)
        {
            return $group;
        }

        $lang  = new Lang('admin');
        $group = ProductConfigGroup::create([
            'name'        => $lang->get('admin.products.config_group.name', ['productName' => $product->name]),
            'description' => $lang->get('admin.products.config_group.description', ['moduleName' => Edition::name()]),
        ]);
        if((int)$group->id > 0)
        {
            ProductConfigLink::create(['gid' => $group->id, 'pid' => $product->id]);
        }

        return $group;
    }
}
