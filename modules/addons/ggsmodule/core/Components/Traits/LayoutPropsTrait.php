<?php

namespace ModulesGarden\ggsmodule\Core\Components\Traits;

use ModulesGarden\ggsmodule\Core\Components\Enums\LayoutProps;

trait LayoutPropsTrait
{

    public function setLayoutProp(LayoutProps $prop):self
    {
        $this->appendCss($prop->value);

        return $this;
    }
}