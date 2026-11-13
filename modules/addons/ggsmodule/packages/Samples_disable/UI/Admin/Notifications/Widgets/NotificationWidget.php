<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\Notifications\Widgets;

use ModulesGarden\ggsmodule\Components\Container\ContainerRow;
use ModulesGarden\ggsmodule\Components\Toolbar\Toolbar;
use ModulesGarden\ggsmodule\Components\Widget\Widget;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\Notifications\Components\Notifications;

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