<?php

namespace GGSModule\App\Models\Whmcs;

class Order extends \WHMCS\Order\Order
{
    public function addons()
    {
        return $this->hasMany('GGSModule\App\Models\Whmcs\HostingAddon', 'orderid');
    }

    public function client()
    {
        return $this->belongsTo('GGSModule\App\Models\Whmcs\Client', 'userid');
    }

    public function domains()
    {
        return $this->hasMany('GGSModule\App\Models\Whmcs\Domain', 'orderid');
    }

    public function services()
    {
        return $this->hasMany('GGSModule\App\Models\Whmcs\Hosting', 'orderid');
    }

    /**
     * @deprecated - use services
     */
    public function hostings()
    {
        return $this->hasMany('GGSModule\App\Models\Whmcs\Hosting', 'orderid');
    }

    public function invoice()
    {
        return $this->hasOne('GGSModule\App\Models\Whmcs\Invoice', 'id', 'invoiceid');
    }

    public function upgrades(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('GGSModule\App\Models\Whmcs\Upgrade', 'orderid');
    }

    public function promotion()
    {
        return $this->hasOne('GGSModule\\App\\Models\\Whmcs\\Promotion', "code", "promocode");
    }
}
