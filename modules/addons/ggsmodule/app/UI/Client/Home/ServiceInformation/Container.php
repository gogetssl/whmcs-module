<?php

namespace ModulesGarden\ggsmodule\App\UI\Client\Home\ServiceInformation;

use ModulesGarden\ggsmodule\App\UI\Client\Sidebars\MainSidebar;
use ModulesGarden\ggsmodule\Components\LayoutWithSidebar\LayoutWithSidebar;
use ModulesGarden\ggsmodule\Core\Contracts\Components\ClientAreaInterface;
use ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\ComplexElements\ServiceInformation\ServiceInformation;

class Container extends LayoutWithSidebar implements ClientAreaInterface
{
    public function loadHtml(): void
    {
        $table = new ServiceInformation();
        $this->addSidebar(new MainSidebar());
        $this->addElement($table);
    }
}