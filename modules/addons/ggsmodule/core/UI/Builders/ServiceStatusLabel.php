<?php

namespace ModulesGarden\ggsmodule\Core\UI\Builders;

use ModulesGarden\ggsmodule\Components\Label\Label;
use ModulesGarden\ggsmodule\Core\Support\Facades\Translator;
use ModulesGarden\ggsmodule\Core\UI\Enums\ServiceStatusConfig;

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