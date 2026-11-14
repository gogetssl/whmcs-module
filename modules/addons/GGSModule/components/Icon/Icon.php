<?php

namespace ModulesGarden\GGSModule\Components\Icon;

use ModulesGarden\GGSModule\App\Libs\Icons;
use ModulesGarden\GGSModule\Core\Components\AbstractComponent;
use ModulesGarden\GGSModule\Core\Components\Traits\CssContainerTrait;
use ModulesGarden\GGSModule\Core\Components\Traits\TitleTrait;

/**
 * Class Form
 */
class Icon extends AbstractComponent
{
    use CssContainerTrait;
    use TitleTrait;

    public const COMPONENT = 'Icon';

    public function setIcon($icon):self
    {
        // inline SVG in a 16px box; the icon class only for a name that has no SVG yet
        $svg = Icons::svg((string)$icon);
        if($svg !== '')
        {
            $this->appendCss('ggs-icobox');
            $this->setSlot('iconSvg', $svg);
        }
        else
        {
            $this->appendCss('mdi mdi-' . $icon);
        }

        return $this;
    }

    public function setContentCentered():self
    {
        $this->appendCss("lu-d-flex lu-justify-content-center");

        return $this;
    }
}
