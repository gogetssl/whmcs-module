<?php

namespace ModulesGarden\GGSModule\Core\Contracts\Controllers;

interface AppControllerInterface
{
    public function getControllerInstanceClass($callerName, $params);
}
