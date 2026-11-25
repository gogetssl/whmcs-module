<?php

namespace GGSModule\App\Models\Whmcs;

class Transaction extends \WHMCS\Billing\Payment\Transaction
{
    public function client()
    {
        return $this->belongsTo('GGSModule\\App\\Models\\Whmcs\\Client', "userid");
    }
    public function invoice()
    {
        return $this->belongsTo('GGSModule\\App\\Models\\Whmcs\\Invoice', "invoiceid");
    }
}
