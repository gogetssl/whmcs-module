<?php

namespace ModulesGarden\GGSModule\Components\Graph\Models\DataSetConfigs;

use ModulesGarden\GGSModule\Components\Graph\Models\DataSetConfigs\Source\StringDataSetConfig;

class CubicInterpolationMode extends StringDataSetConfig
{
    public const DEFAULT = "default";
    public const MONOTONE = "monotone";
}