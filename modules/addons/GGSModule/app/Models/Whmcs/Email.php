<?php

namespace GGSModule\App\Models\Whmcs;

class Email extends \WHMCS\Mail\Log
{
    public function client()
    {
        return $this->belongsTo('GGSModule\\App\\Models\\Whmcs\\Client', 'userid');
    }
}
