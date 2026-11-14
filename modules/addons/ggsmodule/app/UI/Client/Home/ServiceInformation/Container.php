<?php

namespace ModulesGarden\GGSModule\App\UI\Client\Home\ServiceInformation;

use ModulesGarden\GGSModule\App\UI\Client\Sidebars\MainSidebar;
use ModulesGarden\GGSModule\Components\LayoutWithSidebar\LayoutWithSidebar;
use ModulesGarden\GGSModule\Core\Contracts\Components\ClientAreaInterface;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\ComplexElements\ServiceInformation\ServiceInformation;

class Container extends LayoutWithSidebar implements ClientAreaInterface
{
    public function loadHtml(): void
    {
        $table = new ServiceInformation();
        $this->addSidebar(new MainSidebar());
        $this->addElement($table);
    }
}