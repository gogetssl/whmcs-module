<?php

namespace ModulesGarden\GGSModule\Core\WHMCS\Models;

class Contact extends \WHMCS\User\Client\Contact
{
    public function client()
    {
        return $this->belongsTo('ModulesGarden\\GGSModule\\Core\\WHMCS\\Models\\Client', "userid");
    }

    public function orders()
    {
        return $this->hasMany('ModulesGarden\\GGSModule\\Core\\WHMCS\\Models\\Order', "id", "orderid");
    }
}
