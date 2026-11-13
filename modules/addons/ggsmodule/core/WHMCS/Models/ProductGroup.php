<?php

namespace ModulesGarden\ggsmodule\Core\WHMCS\Models;

class ProductGroup extends \WHMCS\Product\Group
{
    public function products()
    {
        return $this->hasMany('ModulesGarden\\ggsmodule\\Core\\WHMCS\\Models\\Product', 'gid');
    }
}
