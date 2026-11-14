<?php

namespace ModulesGarden\GGSModule\Core\Support\Facades;


/**
 * @method static validate(array $data, array $rules, array $customAttributes = [], array $customValues = []);
 */
class Validator extends AbstractFacade
{
    protected static function getFacadeAccessor(): string
    {
        return \ModulesGarden\GGSModule\Core\Services\Validator::class;
    }
}
