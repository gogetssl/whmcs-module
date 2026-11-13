<?php

namespace ModulesGarden\ggsmodule\Components\Badge;

use ModulesGarden\ggsmodule\Core\Components\AbstractComponent;
use ModulesGarden\ggsmodule\Core\Components\Enums\Color;
use ModulesGarden\ggsmodule\Core\Components\Traits\AjaxTrait;
use ModulesGarden\ggsmodule\Core\Components\Traits\OutlineTrait;
use ModulesGarden\ggsmodule\Core\Components\Traits\TextTrait;
use ModulesGarden\ggsmodule\Core\Components\Traits\TitleTrait;

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
