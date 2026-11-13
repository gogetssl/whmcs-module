<?php

namespace ModulesGarden\ggsmodule\Core\WHMCS\Models;

class TicketDepartment extends \WHMCS\Support\Department
{
    public function tickets()
    {
        return $this->hasMany('ModulesGarden\ggsmodule\Core\WHMCS\Models\Ticket', "did");
    }
}
