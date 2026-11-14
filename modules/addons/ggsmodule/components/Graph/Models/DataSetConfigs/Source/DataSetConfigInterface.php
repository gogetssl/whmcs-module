<?php

namespace ModulesGarden\GGSModule\Components\Graph\Models\DataSetConfigs\Source;

interface DataSetConfigInterface
{
    public function getName(): string;
    public function getValue();
}