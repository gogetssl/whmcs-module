<?php

namespace ModulesGarden\ggsmodule\Core\Support\Facades;


class Smarty extends AbstractFacade
{
    protected static function getFacadeAccessor(): string
    {
        return \ModulesGarden\ggsmodule\Core\Services\Smarty::class;
    }
}
