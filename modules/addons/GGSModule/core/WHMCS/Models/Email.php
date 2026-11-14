<?php

namespace ModulesGarden\GGSModule\Core\WHMCS\Models;

class Email extends \WHMCS\Mail\Log
{
    public function client()
    {
        return $this->belongsTo('ModulesGarden\\GGSModule\\Core\\WHMCS\\Models\\Client', 'userid');
    }
}
