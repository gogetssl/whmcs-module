<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\Notifications\Widgets;

use ModulesGarden\GGSModule\Components\Container\ContainerRow;
use ModulesGarden\GGSModule\Components\Toolbar\Toolbar;
use ModulesGarden\GGSModule\Components\Widget\Widget;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\Notifications\Components\Notifications;

class NotificationWidget extends Widget implements AjaxComponentInterface, AdminAreaInterface
{
    public function loadHtml(): void
    {
        $notificationDropdown = new Notifications();

        $bar = new Toolbar();
        $bar->addElement(new ContainerRow());
        $bar->addElement($notificationDropdown);

        $this->addElement($bar);
    }
}