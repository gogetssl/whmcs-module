<?php

namespace ModulesGarden\GGSModule\Components\Link;

use ModulesGarden\GGSModule\Core\Components\AbstractComponent;
use ModulesGarden\GGSModule\Core\Components\Traits\UrlTrait;
use ModulesGarden\GGSModule\Core\Contracts\Components\ComponentInterface;

class Link extends AbstractComponent
{
    use UrlTrait;

    public const COMPONENT = 'Link';

    public function setTitle(string|ComponentInterface $title): self
    {
        $this->setSlot('title', $title);

        return $this;
    }
}