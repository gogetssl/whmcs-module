<?php

namespace ModulesGarden\GGSModule\Core\Components\Traits;

use ModulesGarden\GGSModule\Core\Components\Enums\LayoutProps;

trait LayoutPropsTrait
{

    public function setLayoutProp(LayoutProps $prop):self
    {
        $this->appendCss($prop->value);

        return $this;
    }
}