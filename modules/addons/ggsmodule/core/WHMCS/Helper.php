<?php

namespace ModulesGarden\ggsmodule\Core\WHMCS;

class Helper
{
    public static function isAdminArea(): bool
    {
        return defined('ADMINAREA');
    }

    public static function isClientArea(): bool
    {
        return defined('CLIENTAREA');
    }
}