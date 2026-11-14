<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\BasicElements\LabelsBadgesButtons;

use ModulesGarden\GGSModule\Components\DropdownMenu\DropdownMenu;
use ModulesGarden\GGSModule\Components\DropdownMenuItem\DropdownMenuItem;
use ModulesGarden\GGSModule\Components\Toolbar\Toolbar;
use ModulesGarden\GGSModule\Components\Widget\Widget;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use function ModulesGarden\GGSModule\Core\translator;

class BurgerButtons extends Widget implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->setTitle(translator()->get('Icon Buttons'));

        $dropdown = (new DropdownMenu());
        $dropdown->addItem((new DropdownMenuItem())
            ->setIcon('delete')
            ->setTitle('Delete'));

        $dropdown->addItem((new DropdownMenuItem())
            ->setIcon('plus')
            ->setTitle('Add'));

        $bar = new Toolbar();
        $bar->addElement($dropdown);

        $this->addElement($bar);
    }
}
