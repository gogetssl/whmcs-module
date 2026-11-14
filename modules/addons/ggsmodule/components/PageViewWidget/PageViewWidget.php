<?php

namespace ModulesGarden\GGSModule\Components\PageViewWidget;

use ModulesGarden\GGSModule\Components\Image\Image;
use ModulesGarden\GGSModule\Core\Components\AbstractComponent;
use ModulesGarden\GGSModule\Core\Components\Traits\TitleTrait;
use ModulesGarden\GGSModule\Core\Components\Traits\ToolbarTrait;

class PageViewWidget extends AbstractComponent
{
    use TitleTrait;
    use ToolbarTrait;

    public const COMPONENT = 'PageViewWidget';

    public function setImage(Image $image): self
    {
        $this->setSlot('image', $image);

        return $this;
    }

    public function setDetails(AbstractComponent $details): self
    {
        $this->setSlot('details', $details);

        return $this;
    }

    public function setButtonsContainer(AbstractComponent $buttonsContainer): self
    {
        $this->setSlot('buttonsContainer', $buttonsContainer);

        return $this;
    }
}