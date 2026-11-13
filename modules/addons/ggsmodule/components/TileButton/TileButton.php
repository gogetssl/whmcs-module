<?php

namespace ModulesGarden\ggsmodule\Components\TileButton;

use ModulesGarden\ggsmodule\Components\Button\Button;
use ModulesGarden\ggsmodule\Core\Components\Traits\ImageTrait;

/**
 * Class IconButton
 */
class TileButton extends Button
{
    use ImageTrait;

    public const COMPONENT = 'TileButton';

    public function setActive(bool $active = true): self
    {
        $this->setSlot('active', $active);

        return $this;
    }
}
