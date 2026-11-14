<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\TreeView\Dropdowns;

use ModulesGarden\GGSModule\Components\Dropdown\Dropdown;
use ModulesGarden\GGSModule\Core\Components\Actions\ReloadById;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\GGSModule\Core\Support\Facades\Request;
use ModulesGarden\GGSModule\Core\WHMCS\Models\Client;
use ModulesGarden\GGSModule\Core\WHMCS\Models\Hosting;
use WHMCS\Database\Capsule as DB;


class Services extends Dropdown implements AdminAreaInterface, AjaxComponentInterface
{
    public function __construct()
    {
        parent::__construct();

        $this->setId('service_id');
        $this->setName('service_id');
    }

    public function loadHtml(): void
    {
        //$this->setName('clients');
//        $this->setAjaxOnLoad();
//        $this->setAjaxSearch();
        $this->setMultiple();

    }

    public function loadData(): void
    {
        $clients = Hosting::select(DB::raw('id as value'), DB::raw('domain as name'))->where('userid', (int) Request::get('ajaxData')['value'] ?? null)
            ->get()
            ->toArray();

        $this->setOptions($clients);
    }
}
