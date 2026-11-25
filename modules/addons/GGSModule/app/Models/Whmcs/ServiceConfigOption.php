<?php

namespace GGSModule\App\Models\Whmcs;

class ServiceConfigOption extends \WHMCS\Service\ConfigOption
{
    public function productConfigOptionSelection()
    {
        return $this->hasOne('GGSModule\\App\\Models\\Whmcs\\ProductConfigOptionSub', "id", "optionid");
    }

    public function productConfigOption()
    {
        return $this->hasOne('GGSModule\\App\\Models\\Whmcs\\ProductConfigOption', "id", "configid");
    }

    public function service()
    {
        return $this->hasOne('GGSModule\\App\\Models\\Whmcs\\Service', "id", "relid");
    }
}
