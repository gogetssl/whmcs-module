<?php

namespace ModulesGarden\GGSModule\Components\Alert;

use ModulesGarden\GGSModule\Core\Components\AbstractComponent;
use ModulesGarden\GGSModule\Core\Components\Traits\AjaxTrait;
use ModulesGarden\GGSModule\Core\Components\Traits\OutlineTrait;
use ModulesGarden\GGSModule\Core\Components\Traits\TextTrait;
use ModulesGarden\GGSModule\Core\Components\Traits\TitleTrait;

class Alert extends AbstractComponent
{
    use AjaxTrait;
    use TitleTrait;
    use TextTrait;
    use OutlineTrait;

    public const COMPONENT = 'Alert';


    /**
     * @param string $size
     * @return $this
     */
    public function setSize(string $size): self
    {
        $this->setSlot('size', $size);

        return $this;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setType(string $title): self
    {
        $this->setSlot('type', $title);

        return $this;
    }

    /**
     * @param bool $showDismissButton
     * @return $this
     */
    public function showDismissButton(bool $showDismissButton = true): self
    {
        $this->setSlot('dismiss_button', $showDismissButton);

        return $this;
    }
}
