<?php

namespace ModulesGarden\ggsmodule\Core\WHMCS\Models;

class ServiceConfigOption extends \WHMCS\Service\ConfigOption
{
    public function productConfigOptionSelection()
    {
        return $this->hasOne('ModulesGarden\\ggsmodule\\Core\\WHMCS\\Models\\ProductConfigOptionSub', "id", "optionid");
    }

    public function productConfigOption()
    {
        return $this->hasOne('ModulesGarden\\ggsmodule\\Core\\WHMCS\\Models\\ProductConfigOption', "id", "configid");
    }

    public function service()
    {
        return $this->hasOne('ModulesGarden\\ggsmodule\\Core\\WHMCS\\Models\\Service', "id", "relid");
    }
}