<?php

namespace ModulesGarden\ggsmodule\Core\WHMCS\Models;

/**
 * Description of CustomFieldValue
 *
 * @var fieldid
 * @var relid
 * @var value
 */
class CustomFieldValue extends \WHMCS\CustomField\CustomFieldValue
{
    public function customField()
    {
        return $this->belongsTo('ModulesGarden\\ggsmodule\\Core\\WHMCS\\Models\\CustomField', "fieldid");
    }
    public function addon()
    {
        return $this->belongsTo('ModulesGarden\\ggsmodule\\Core\\WHMCS\\Models\\ServiceAddon', "relid");
    }
    public function client()
    {
        return $this->belongsTo('ModulesGarden\\ggsmodule\\Core\\WHMCS\\Models\\Client', "relid");
    }
    public function service()
    {
        return $this->belongsTo("WModulesGarden\ggsmodule\Core\WHMCS\Models\Service", "relid");
    }
}
