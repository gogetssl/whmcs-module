<?php

namespace ModulesGarden\ggsmodule\Components\BlockZeroData;

use ModulesGarden\ggsmodule\App\Libs\Icons;
use ModulesGarden\ggsmodule\Components\Container\Container;
use ModulesGarden\ggsmodule\Core\Components\Traits\DescriptionTrait;
use ModulesGarden\ggsmodule\Core\Components\Traits\TitleTrait;
use ModulesGarden\ggsmodule\Core\Contracts\Components\ComponentContainerInterface;

class BlockZeroData extends Container implements ComponentContainerInterface
{
    use TitleTrait;
    use DescriptionTrait;

    public const COMPONENT = 'BlockZeroData';

    public function setIcon(string $icon): self
    {
        $this->setSlot('icon', $icon);
        // inline SVG, rendered instead of the icon class when there is one
        $this->setSlot('iconSvg', Icons::svg($icon));

        return $this;
    }
}
