<?php

namespace ModulesGarden\ggsmodule\Components\FormInputEmail;

use ModulesGarden\ggsmodule\Components\FormInputText\FormInputText;

class FormInputEmail extends FormInputText
{
    public function __construct()
    {
        parent::__construct();

        $this->setType('email');
        $this->setPlaceholder('email@example.com');
    }
}
