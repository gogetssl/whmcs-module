<?php

namespace ModulesGarden\ggsmodule\Core\WHMCS\Models;

class Email extends \WHMCS\Mail\Log
{
    public function client()
    {
        return $this->belongsTo('ModulesGarden\\ggsmodule\\Core\\WHMCS\\Models\\Client', 'userid');
    }
}
