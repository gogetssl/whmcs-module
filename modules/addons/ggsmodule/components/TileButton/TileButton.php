<?php

namespace ModulesGarden\GGSModule\Components\TileButton;

use ModulesGarden\GGSModule\Components\Button\Button;
use ModulesGarden\GGSModule\Core\Components\Traits\ImageTrait;

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
