<?php

namespace ModulesGarden\GGSModule\App\UI\Client\Home\Index;

use ModulesGarden\GGSModule\App\UI\Client\Sidebars\MainSidebar;
use ModulesGarden\GGSModule\Components\LayoutWithSidebar\LayoutWithSidebar;
use ModulesGarden\GGSModule\Core\Contracts\Components\ClientAreaInterface;
use ModulesGarden\GGSModule\Packages\Logs\UI\Pages\LogsDataTable;

class Container extends LayoutWithSidebar implements ClientAreaInterface
{
    public function loadHtml(): void
    {
        $table = new LogsDataTable();
        $this->addSidebar(new MainSidebar());
        $this->addElement($table);
    }
}