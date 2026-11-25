<?php

namespace GGSModule\App\Models\Whmcs;

class ProductConfigOption extends \WHMCS\Product\ConfigOption
{
    /**
     * @deprecated - use selectableOptions
     */
    public function suboptions()
    {
        return $this->hasMany('GGSModule\\App\\Models\\Whmcs\\ProductConfigOptionSub', 'configid', "id");
    }

    public function selectableOptions()
    {
        return $this->hasMany('GGSModule\\App\\Models\\Whmcs\\ProductConfigOptionSub', "configid", "id");
    }

    public function configGroup()
    {
        return $this->belongsTo('GGSModule\\App\\Models\\Whmcs\\ProductConfigGroup', "gid", "id");
    }

    public function scopeOfProductId($query, $productId)
    {
        return $query->whereIn("gid", ProductConfigLink::ofProductId($productId)->pluck("gid"));
    }
}
