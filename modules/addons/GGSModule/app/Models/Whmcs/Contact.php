<?php

namespace GGSModule\App\Models\Whmcs;

class Contact extends \WHMCS\User\Client\Contact
{
    public function client()
    {
        return $this->belongsTo('GGSModule\\App\\Models\\Whmcs\\Client', "userid");
    }

    public function orders()
    {
        return $this->hasMany('GGSModule\\App\\Models\\Whmcs\\Order', "id", "orderid");
    }
}
