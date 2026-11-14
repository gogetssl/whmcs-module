<?php

namespace ModulesGarden\GGSModule\Core\WHMCS\Models;

class TicketDepartment extends \WHMCS\Support\Department
{
    public function tickets()
    {
        return $this->hasMany('ModulesGarden\GGSModule\Core\WHMCS\Models\Ticket', "did");
    }
}
