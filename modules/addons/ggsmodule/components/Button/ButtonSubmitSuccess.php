<?php

namespace ModulesGarden\ggsmodule\Components\Button;

class ButtonSubmitSuccess extends ButtonSuccess
{
    public function __construct()
    {
        parent::__construct();

        $this->setType(self::TYPE_SUBMIT);
    }
}
