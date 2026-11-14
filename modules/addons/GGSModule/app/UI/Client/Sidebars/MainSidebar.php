<?php

namespace ModulesGarden\GGSModule\App\UI\Client\Sidebars;

use ModulesGarden\GGSModule\App\UI\Client\Sidebars\Buttons\SidebarSampleButton;
use ModulesGarden\GGSModule\Components\Sidebar\Sidebar;
use ModulesGarden\GGSModule\Components\SidebarItem\SidebarItem;
use ModulesGarden\GGSModule\Core\Contracts\Components\ClientAreaInterface;

class MainSidebar extends Sidebar implements ClientAreaInterface
{
    public function loadHtml(): void
    {
        $this->setTitle("Useless sidebar");

        $item = new SidebarItem("Logs Data Table", "https://whmcs.docker/index.php?mg-page=Home&m=GGSModule");
        $item2 = new SidebarItem("Service Information", "https://whmcs.docker/index.php?mg-page=Home&mg-action=ServiceInformation&m=GGSModule");
        $item3 = new SidebarItem("Industrial Disk", "https://whmcs.docker/index.php?mg-page=Home&m=GGSModule");
        $item4 = new SidebarItem("Servers Information");

        $item4->addElement(new SidebarSampleButton());

        $this->addItem($item);
        $this->addItem($item2);
        $this->addItem($item3);
        $this->addItem($item4);
    }
}