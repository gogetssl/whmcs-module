<?php

namespace ModulesGarden\GGSModule\Components\IconText;

use ModulesGarden\GGSModule\Core\Components\Enums\Type;

class IconTextSecondary extends IconText
{
    public function __construct()
    {
        parent::__construct();
        $this->setType(Type::SECONDARY);
    }
}