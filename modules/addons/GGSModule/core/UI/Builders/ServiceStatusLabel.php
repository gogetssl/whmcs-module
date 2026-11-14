<?php

namespace ModulesGarden\GGSModule\Core\UI\Builders;

use ModulesGarden\GGSModule\Components\Label\Label;
use ModulesGarden\GGSModule\Core\Support\Facades\Translator;
use ModulesGarden\GGSModule\Core\UI\Enums\ServiceStatusConfig;

class ServiceStatusLabel
{
    public static function create(string $type): Label
    {
        $config = ServiceStatusConfig::byStatus($type);

        $label = new Label();
        $label->setText(Translator::get("service.status.{$type}"));
        $label->displayAsStatusLabel();
        $label->setType($config['type']);

        return $label;
    }

}