<?php

namespace ModulesGarden\GGSModule\Components\IconText;

use ModulesGarden\GGSModule\Components\Icon\Icon;
use ModulesGarden\GGSModule\Core\Components\Traits\TextTrait;

/**
 * Class IconButton
 */
class IconText extends Icon
{
    use TextTrait;

    public const COMPONENT = 'IconText';

    public function setLeftTextPosition(bool $leftTextPosition = true):self
    {
        $this->setSlot('leftTextPosition', $leftTextPosition);

        return $this;
    }

    public function setType(string $type):self
    {
        $this->setSlot('type', $type);

        return $this;
    }
}
