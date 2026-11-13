<?php

namespace ModulesGarden\ggsmodule\Core\WHMCS\Config;

use ModulesGarden\ggsmodule\Core\Data\Container;

class Config extends Container
{
    public function __construct()
    {
        global $CONFIG;
        parent::__construct($CONFIG);
    }
}