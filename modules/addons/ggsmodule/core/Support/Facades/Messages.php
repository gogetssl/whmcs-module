<?php

namespace ModulesGarden\ggsmodule\Core\Support\Facades;


/**
 * @see \ModulesGarden\ggsmodule\Core\Services\Messages
 * @method static alert(string $message)
 * @method static toast(string $message)
 * @method static flash(string $message)
 */
class Messages extends AbstractFacade
{
    protected static function getFacadeAccessor(): string
    {
        return \ModulesGarden\ggsmodule\Core\Services\Messages::class;
    }
}
