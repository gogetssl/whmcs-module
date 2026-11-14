<?php

namespace ModulesGarden\GGSModule\Components\TabsWidget;

use ModulesGarden\GGSModule\Components\Tab\Tab;
use ModulesGarden\GGSModule\Components\Widget\Widget;
use ModulesGarden\GGSModule\Core\Contracts\Components\ComponentInterface;

/**
 * Class TabsWidget
 */
class TabsWidget extends Widget
{
    public const COMPONENT = 'TabsWidget';

    /**
     * @param ComponentInterface $component
     */
    public function addTab(Tab $component)
    {
        $this->addComponent('tabs', $component);
    }

    public function disableSwiper(bool $disableSwiper = true):self
    {
        $this->setSlot('disableSwiper', $disableSwiper);

        return $this;
    }
}
