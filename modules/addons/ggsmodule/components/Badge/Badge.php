<?php

namespace ModulesGarden\GGSModule\Components\Badge;

use ModulesGarden\GGSModule\Core\Components\AbstractComponent;
use ModulesGarden\GGSModule\Core\Components\Enums\Color;
use ModulesGarden\GGSModule\Core\Components\Traits\AjaxTrait;
use ModulesGarden\GGSModule\Core\Components\Traits\OutlineTrait;
use ModulesGarden\GGSModule\Core\Components\Traits\TextTrait;
use ModulesGarden\GGSModule\Core\Components\Traits\TitleTrait;

/**
 * Class Form
 */
class Badge extends AbstractComponent
{
    use AjaxTrait;
    use TextTrait;
    use TitleTrait;
    use OutlineTrait;

    public const COMPONENT = 'Badge';

    public function __construct()
    {
        parent::__construct();

        $this->setType(Color::DEFAULT);
    }

    public function setType(string $type)
    {
        $this->setSlot('type', $type);

        return $this;
    }
}
