<?php

namespace ModulesGarden\ggsmodule\Core\Validation\Rules;

use ModulesGarden\ggsmodule\Core\Contracts\Validation\ImplicitRuleInterface;

class Sample implements ImplicitRuleInterface
{
    public function passes($attribute, $value)
    {
        return false;
    }

    public function message()
    {
        return '';
    }
}