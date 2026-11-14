<?php

namespace ModulesGarden\GGSModule\Components\FormInputEmail;

use ModulesGarden\GGSModule\Components\FormInputText\FormInputText;

class FormInputEmail extends FormInputText
{
    public function __construct()
    {
        parent::__construct();

        $this->setType('email');
        $this->setPlaceholder('email@example.com');
    }
}
