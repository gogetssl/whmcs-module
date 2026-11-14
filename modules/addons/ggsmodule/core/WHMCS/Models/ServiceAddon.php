<?php

namespace ModulesGarden\GGSModule\Core\WHMCS\Models;

class ServiceAddon extends \WHMCS\Service\Addon
{
    public function productAddon()
    {
        return $this->belongsTo('ModulesGarden\\GGSModule\\Core\\WHMCS\\Models\\Addon', 'addonid');
    }

    public function service()
    {
        return $this->belongsTo('ModulesGarden\\GGSModule\\Core\\WHMCS\\Models\\Service', 'hostingid');
    }

    public function order()
    {
        return $this->belongsTo('ModulesGarden\\GGSModule\\Core\\WHMCS\\Models\\Order', 'orderid');
    }

    public function client()
    {
        return $this->belongsTo('ModulesGarden\\GGSModule\\Core\\WHMCS\\Models\\Client', "userid");
    }

    public function customFieldValues()
    {
        return $this->hasMany('ModulesGarden\\GGSModule\\Core\\WHMCS\\Models\\CustomFieldValue', "relid");
    }

    public function paymentGateway()
    {
        return $this->hasMany('ModulesGarden\\GGSModule\\Core\\WHMCS\\Models\\PaymentGateway', "gateway", "paymentmethod");
    }

    public function serverModel()
    {
        return $this->hasOne('ModulesGarden\\GGSModule\\Core\\WHMCS\\Models\\Server', "id", "server");
    }
}