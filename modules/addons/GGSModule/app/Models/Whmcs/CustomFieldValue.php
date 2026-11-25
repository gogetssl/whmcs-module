<?php

namespace GGSModule\App\Models\Whmcs;

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
        return $this->belongsTo('GGSModule\\App\\Models\\Whmcs\\CustomField', "fieldid");
    }
    public function addon()
    {
        return $this->belongsTo('GGSModule\\App\\Models\\Whmcs\\ServiceAddon', "relid");
    }
    public function client()
    {
        return $this->belongsTo('GGSModule\\App\\Models\\Whmcs\\Client', "relid");
    }
    public function service()
    {
        return $this->belongsTo("WGGSModule\App\Models\Whmcs\Service", "relid");
    }
}
