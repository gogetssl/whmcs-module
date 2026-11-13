<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\Home\SimpleForm\Alerts;

use ModulesGarden\ggsmodule\Components\Alert\Alert;
use ModulesGarden\ggsmodule\Core\Components\Enums\Color;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;


class RandomAlert extends Alert implements AdminAreaInterface
{
    public function loadData(): void
    {
        $colors = [
            Color::DANGER,
            Color::INFO,
            Color::PRIMARY,
            Color::SUCCESS,
            Color::WARNING,
        ];
        $this->setType($colors[rand(0, 4)]);
    }

    public function loadHtml(): void
    {
        $this->setText('This is some text');
    }
}
