<?php

namespace ModulesGarden\ggsmodule\Components\Form\Data;

use function ModulesGarden\ggsmodule\Core\validator;

class Validate
{
    public function run(array $elements)
    {
        $validatableElementsBag = new ValidatableElementsBag($elements);

        $input = array_merge(
            \ModulesGarden\ggsmodule\Core\Support\Facades\Request::get('formData', []),
            \ModulesGarden\ggsmodule\Core\Support\Facades\Request::files()->get('formData', [])
        );

        validator()->validate(
            $input ?? [],
            $validatableElementsBag->getValidators(),
            $validatableElementsBag->getCustomAttributes(),
            $validatableElementsBag->getCustomValues()
        );
    }
}
