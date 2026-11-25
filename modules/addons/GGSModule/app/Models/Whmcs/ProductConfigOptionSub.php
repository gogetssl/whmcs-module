<?php

namespace GGSModule\App\Models\Whmcs;

class ProductConfigOptionSub extends \WHMCS\Product\ConfigOptionSelection
{
    public function configOption()
    {
        return $this->belongsTo('GGSModule\\App\\Models\\Whmcs\\ProductConfigOption', 'configid');
    }
}
