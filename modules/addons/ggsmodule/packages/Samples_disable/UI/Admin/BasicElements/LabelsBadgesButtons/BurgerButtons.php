<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\BasicElements\LabelsBadgesButtons;

use ModulesGarden\ggsmodule\Components\DropdownMenu\DropdownMenu;
use ModulesGarden\ggsmodule\Components\DropdownMenuItem\DropdownMenuItem;
use ModulesGarden\ggsmodule\Components\Toolbar\Toolbar;
use ModulesGarden\ggsmodule\Components\Widget\Widget;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;
use function ModulesGarden\ggsmodule\Core\translator;

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
