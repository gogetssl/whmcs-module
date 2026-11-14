<?php

namespace ModulesGarden\GGSModule\Core\Components\Decorator;

use ModulesGarden\GGSModule\Core\Components\Enums\BackgroundColor;

class Background extends AbstractDecorator
{
    public function setGrey(): self
    {
        return $this->setColor(BackgroundColor::GREY);
    }

    public function setColor(string $colorClass): self
    {
        $this->component->appendCss($colorClass);

        return $this;
    }

    public function setDefault(): self
    {
        return $this->setColor(BackgroundColor::DEFAULT);
    }
}