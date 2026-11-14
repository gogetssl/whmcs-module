<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\ComplexElements\SubPages\ContainerReload;

use ModulesGarden\GGSModule\Components\Alert\AlertInfo;
use ModulesGarden\GGSModule\Components\IconButton\IconButton;
use ModulesGarden\GGSModule\Components\Widget\Widget;
use ModulesGarden\GGSModule\Core\Components\Actions\Reload;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;

class Container extends \ModulesGarden\GGSModule\Components\Container\Container implements AdminAreaInterface
{
    /**
     * @return void
     */
    public function loadHtml(): void
    {
        $shouldShow = true;
        //loadHtml method is also called in Ajax so there is no need to implement separated method in this case
        if ($shouldShow)
        {
            $widget = new Widget();
            $widget->setTitle('Close me!');

            $button = new IconButton();
            $button->onClick(new Reload($this));
            $button->setIcon('refresh');
            $widget->addToToolbar($button);

            $alert = new AlertInfo();
            $alert->setText('Click icon in the toolbar if you want to hide this section');
            $widget->addElement($alert);

            $this->addElement($widget);
        }
    }

    public function loadData(): void
    {
        $this->clearElements();
    }
}