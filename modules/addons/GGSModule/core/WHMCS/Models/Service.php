<?php

namespace ModulesGarden\GGSModule\Core\WHMCS\Models;

class Service extends \WHMCS\Service\Service
{
    public function addons()
    {
        return $this->hasMany('ModulesGarden\\GGSModule\\Core\\WHMCS\\Models\\ServiceAddon', 'hostingid');
    }

    public function cancellationRequests()
    {
        return $this->hasOne('ModulesGarden\\GGSModule\\Core\\WHMCS\\Models\\CancelRequest', 'relid');
    }

    public function client()
    {
        return $this->belongsTo('ModulesGarden\\GGSModule\\Core\\WHMCS\\Models\\Client', 'userid');
    }

    public function configOptions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('ModulesGarden\\GGSModule\\Core\\WHMCS\\Models\\ServiceConfigOption', 'relid');
    }

    public function customFieldValues()
    {
        return $this->hasMany('ModulesGarden\\GGSModule\\Core\\WHMCS\\Models\\CustomFieldValue', "relid");
    }

    public function order()
    {
        return $this->belongsTo('ModulesGarden\\GGSModule\\Core\\WHMCS\\Models\\Order', 'orderid');
    }

    public function product()
    {
        return $this->belongsTo('ModulesGarden\\GGSModule\\Core\\WHMCS\\Models\\Product', 'packageid');
    }

    public function server()
    {
        return $this->belongsTo('ModulesGarden\\GGSModule\\Core\\WHMCS\\Models\\Server', 'server');
    }

    public function promotion()
    {
        return $this->hasMany('ModulesGarden\\GGSModule\\Core\\WHMCS\\Models\\Promotion', "id", "promoid");
    }

    public function paymentGateway()
    {
        return $this->hasMany('ModulesGarden\\GGSModule\\Core\\WHMCS\\Models\\PaymentGateway', "gateway", "paymentmethod");
    }
}