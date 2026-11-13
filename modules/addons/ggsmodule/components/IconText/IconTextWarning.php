<?php

namespace ModulesGarden\ggsmodule\Components\IconText;

use ModulesGarden\ggsmodule\Core\Components\Enums\Type;

class IconTextWarning extends IconText
{
    public function __construct()
    {
        parent::__construct();
        $this->setType(Type::WARNING);
    }
}