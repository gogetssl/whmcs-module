<?php

namespace ModulesGarden\ggsmodule\App\UI\Client\Home\Index;

use ModulesGarden\ggsmodule\App\UI\Client\Sidebars\MainSidebar;
use ModulesGarden\ggsmodule\Components\LayoutWithSidebar\LayoutWithSidebar;
use ModulesGarden\ggsmodule\Core\Contracts\Components\ClientAreaInterface;
use ModulesGarden\ggsmodule\Packages\Logs\UI\Pages\LogsDataTable;

class Container extends LayoutWithSidebar implements ClientAreaInterface
{
    public function loadHtml(): void
    {
        $table = new LogsDataTable();
        $this->addSidebar(new MainSidebar());
        $this->addElement($table);
    }
}