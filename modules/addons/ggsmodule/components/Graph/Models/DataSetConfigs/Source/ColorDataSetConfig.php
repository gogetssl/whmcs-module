<?php

namespace ModulesGarden\GGSModule\Components\Graph\Models\DataSetConfigs\Source;

use ModulesGarden\GGSModule\Core\Helper\Color\Models\Color;

abstract class ColorDataSetConfig extends AbstractDataSetConfig
{
    protected Color $color;

    public function __construct(Color $color)
    {
        $this->color = $color;
    }

    public function getValue()
    {
        return $this->color->getRgba();
    }
}