<?php

namespace ModulesGarden\GGSModule\Core\WHMCS\Models;

class ProductConfigOptionSub extends \WHMCS\Product\ConfigOptionSelection
{
    public function configOption()
    {
        return $this->belongsTo('ModulesGarden\\GGSModule\\Core\\WHMCS\\Models\\ProductConfigOption', 'configid');
    }
}
