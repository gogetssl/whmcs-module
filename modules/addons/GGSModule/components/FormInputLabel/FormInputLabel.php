<?php

namespace ModulesGarden\GGSModule\Components\FormInputLabel;

use ModulesGarden\GGSModule\App\Libs\Icons;
use ModulesGarden\GGSModule\Core\Components\AbstractComponent;
use ModulesGarden\GGSModule\Core\Components\Traits\CssContainerTrait;
use ModulesGarden\GGSModule\Core\Components\Traits\TextTrait;
use ModulesGarden\GGSModule\Core\Contracts\Components\FormFieldInterface;

class FormInputLabel extends AbstractComponent implements FormFieldInterface
{
    use TextTrait;
    use CssContainerTrait;

    public const COMPONENT = 'FormInputLabel';

    public function getName(): string
    {
        return '';
    }

    public function setIcon(string $icon): self
    {
        $this->setSlot('icon', $icon);
        // inline SVG, rendered instead of the icon class when there is one
        $this->setSlot('iconSvg', Icons::svg($icon));

        return $this;
    }

    public function setFor(string $for): self
    {
        $this->setSlot('for', $for);

        return $this;
    }
}