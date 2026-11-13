<?php

namespace ModulesGarden\ggsmodule\Components\Widget;

use ModulesGarden\ggsmodule\App\Libs\Icons;
use ModulesGarden\ggsmodule\Components\Container\Container;
use ModulesGarden\ggsmodule\Core\Components\Traits\TitleTrait;
use ModulesGarden\ggsmodule\Core\Components\Traits\ToolbarTrait;
use ModulesGarden\ggsmodule\Core\Contracts\Components\ComponentContainerInterface;

class Widget extends Container implements ComponentContainerInterface
{
    use TitleTrait;
    use ToolbarTrait;

    public const COMPONENT = 'Widget';

    /** A second line under the title, in the widget header */
    public function setSubtitle(string $subtitle)
    {
        $this->setSlot('subtitle', $subtitle);

        return $this;
    }

    public function setIcon(string $icon)
    {
        // inline SVG; the class only for a name that has no SVG yet
        $svg = Icons::svg($icon);
        $this->setSlot('icon', $svg !== '' ? $svg : 'mdi mdi-' . $icon);
    }
}


