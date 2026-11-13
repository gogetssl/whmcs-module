<?php

namespace ModulesGarden\ggsmodule\Components\PageDescription;

use ModulesGarden\ggsmodule\Core\Components\AbstractComponent;
use ModulesGarden\ggsmodule\Core\Components\Traits\ImageTrait;
use ModulesGarden\ggsmodule\Core\Components\Traits\TitleTrait;

/**
 * Class Form
 */
class PageDescription extends AbstractComponent
{
    use ImageTrait;
    use TitleTrait;

    public const COMPONENT = 'PageDescription';

    public function setContent(string $content): self
    {
        $this->setSlot('content', $content);

        return $this;
    }
}
