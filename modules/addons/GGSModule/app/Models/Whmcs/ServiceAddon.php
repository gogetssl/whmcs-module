<?php

namespace GGSModule\App\Models\Whmcs;

class ServiceAddon extends \WHMCS\Service\Addon
{
    public function productAddon()
    {
        return $this->belongsTo('GGSModule\\App\\Models\\Whmcs\\Addon', 'addonid');
    }

    public function service()
    {
        return $this->belongsTo('GGSModule\\App\\Models\\Whmcs\\Service', 'hostingid');
    }

    public function order()
    {
        return $this->belongsTo('GGSModule\\App\\Models\\Whmcs\\Order', 'orderid');
    }

    public function client()
    {
        return $this->belongsTo('GGSModule\\App\\Models\\Whmcs\\Client', "userid");
    }

    public function customFieldValues()
    {
        return $this->hasMany('GGSModule\\App\\Models\\Whmcs\\CustomFieldValue', "relid");
    }

    public function paymentGateway()
    {
        return $this->hasMany('GGSModule\\App\\Models\\Whmcs\\PaymentGateway', "gateway", "paymentmethod");
    }

    public function serverModel()
    {
        return $this->hasOne('GGSModule\\App\\Models\\Whmcs\\Server', "id", "server");
    }
}
