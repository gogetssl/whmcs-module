<?php

namespace ModulesGarden\GGSModule\Core\Support\Facades;


class Smarty extends AbstractFacade
{
    protected static function getFacadeAccessor(): string
    {
        return \ModulesGarden\GGSModule\Core\Services\Smarty::class;
    }
}
