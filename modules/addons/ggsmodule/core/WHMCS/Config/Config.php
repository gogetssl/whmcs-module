<?php

namespace ModulesGarden\GGSModule\Core\WHMCS\Config;

use ModulesGarden\GGSModule\Core\Data\Container;

class Config extends Container
{
    public function __construct()
    {
        global $CONFIG;
        parent::__construct($CONFIG);
    }
}