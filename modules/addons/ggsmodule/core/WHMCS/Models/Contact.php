<?php

namespace ModulesGarden\ggsmodule\Core\WHMCS\Models;

class Contact extends \WHMCS\User\Client\Contact
{
    public function client()
    {
        return $this->belongsTo('ModulesGarden\\ggsmodule\\Core\\WHMCS\\Models\\Client', "userid");
    }

    public function orders()
    {
        return $this->hasMany('ModulesGarden\\ggsmodule\\Core\\WHMCS\\Models\\Order', "id", "orderid");
    }
}
