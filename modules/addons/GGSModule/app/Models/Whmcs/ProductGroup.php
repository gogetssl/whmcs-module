<?php

namespace GGSModule\App\Models\Whmcs;

class ProductGroup extends \WHMCS\Product\Group
{
    public function products()
    {
        return $this->hasMany('GGSModule\\App\\Models\\Whmcs\\Product', 'gid');
    }
}
