<?php

namespace ModulesGarden\GGSModule\Components\Form\Data;

use function ModulesGarden\GGSModule\Core\validator;

class Validate
{
    public function run(array $elements)
    {
        $validatableElementsBag = new ValidatableElementsBag($elements);

        $input = array_merge(
            \ModulesGarden\GGSModule\Core\Support\Facades\Request::get('formData', []),
            \ModulesGarden\GGSModule\Core\Support\Facades\Request::files()->get('formData', [])
        );

        validator()->validate(
            $input ?? [],
            $validatableElementsBag->getValidators(),
            $validatableElementsBag->getCustomAttributes(),
            $validatableElementsBag->getCustomValues()
        );
    }
}
