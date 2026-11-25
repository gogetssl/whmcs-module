<?php

namespace GGSModule\App\Models\Whmcs;

class Service extends \WHMCS\Service\Service
{
    public function addons()
    {
        return $this->hasMany('GGSModule\\App\\Models\\Whmcs\\ServiceAddon', 'hostingid');
    }

    public function cancellationRequests()
    {
        return $this->hasOne('GGSModule\\App\\Models\\Whmcs\\CancelRequest', 'relid');
    }

    public function client()
    {
        return $this->belongsTo('GGSModule\\App\\Models\\Whmcs\\Client', 'userid');
    }

    public function configOptions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('GGSModule\\App\\Models\\Whmcs\\ServiceConfigOption', 'relid');
    }

    public function customFieldValues()
    {
        return $this->hasMany('GGSModule\\App\\Models\\Whmcs\\CustomFieldValue', "relid");
    }

    public function order()
    {
        return $this->belongsTo('GGSModule\\App\\Models\\Whmcs\\Order', 'orderid');
    }

    public function product()
    {
        return $this->belongsTo('GGSModule\\App\\Models\\Whmcs\\Product', 'packageid');
    }

    public function server()
    {
        return $this->belongsTo('GGSModule\\App\\Models\\Whmcs\\Server', 'server');
    }

    public function promotion()
    {
        return $this->hasMany('GGSModule\\App\\Models\\Whmcs\\Promotion', "id", "promoid");
    }

    public function paymentGateway()
    {
        return $this->hasMany('GGSModule\\App\\Models\\Whmcs\\PaymentGateway', "gateway", "paymentmethod");
    }
}
