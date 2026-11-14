<?php

namespace ModulesGarden\GGSModule\Components\FormInputPassword;

use ModulesGarden\GGSModule\Components\FormInputText\FormInputText;

/**
 * Class IconButton
 */
class FormInputPassword extends FormInputText
{
    public const COMPONENT = 'FormInputText';

    public function __construct()
    {
        parent::__construct();

        $this->setType('password');
    }
}
