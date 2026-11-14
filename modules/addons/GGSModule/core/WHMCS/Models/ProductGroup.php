<?php

namespace ModulesGarden\GGSModule\Core\WHMCS\Models;

class ProductGroup extends \WHMCS\Product\Group
{
    public function products()
    {
        return $this->hasMany('ModulesGarden\\GGSModule\\Core\\WHMCS\\Models\\Product', 'gid');
    }
}
