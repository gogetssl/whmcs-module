<?php

namespace ModulesGarden\ggsmodule\Components\IconText;

use ModulesGarden\ggsmodule\Core\Components\Enums\Type;

class IconTextDanger extends IconText
{
    public function __construct()
    {
        parent::__construct();
        $this->setType(Type::DANGER);
    }
}