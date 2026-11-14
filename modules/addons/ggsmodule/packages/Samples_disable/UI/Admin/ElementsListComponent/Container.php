<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\ElementsListComponent;

use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\ElementsListComponent\ElementsLists\ElementsList;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\ElementsListComponent\ElementsLists\WordPressSampleList;

class Container extends \ModulesGarden\GGSModule\Components\Container\Container implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new WordPressSampleList());
        $this->addElement(new ElementsList());
    }
}