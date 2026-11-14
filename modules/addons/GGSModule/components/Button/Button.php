<?php

namespace ModulesGarden\GGSModule\Components\Button;

use ModulesGarden\GGSModule\App\Libs\Icons;
use ModulesGarden\GGSModule\Core\Components\FallbackTraits\ButtonFallbackTrait;
use ModulesGarden\GGSModule\Core\Components\FormFields\FormField;
use ModulesGarden\GGSModule\Core\Components\Traits\ActionOnClickTrait;
use ModulesGarden\GGSModule\Core\Components\Traits\LayoutPropsTrait;

class Button extends FormField
{
    use ButtonFallbackTrait;
    use ActionOnClickTrait;
    use LayoutPropsTrait;

    public const COMPONENT   = 'Button';
    public const TYPE_BUTTON = 'button';
    public const TYPE_CANCEL = 'cancel';
    public const TYPE_SUBMIT = 'submit';

    public function __construct()
    {
        parent::__construct();

        $this->setTranslations([
            'title',
        ]);

        $this->setTitle($this->translate('title'));
        $this->setType(self::TYPE_BUTTON);
    }

    /**
     * @param string $icon
     * @return $this
     */
    public function setIcon(string $icon): self
    {
        $this->setSlot('icon', 'lu-mdi mdi mdi-' . $icon);
        // inline SVG, rendered instead of the icon class when there is one
        $this->setSlot('iconSvg', Icons::svg($icon));

        return $this;
    }

    /**
     * @param string $size
     * @return Button
     */
    public function setSize(string $size): self
    {
        $this->setSlot('size', $size);

        return $this;
    }

    /**
     * @param string $type
     * @return Button
     */
    public function setType(string $type): self
    {
        $this->setSlot('type', $type);

        return $this;
    }

    /**
     * @param string $title
     * @return self
     **/
    public function setTitle(string $title): self
    {
        $this->setSlot('title', $title);

        return $this;
    }
}
