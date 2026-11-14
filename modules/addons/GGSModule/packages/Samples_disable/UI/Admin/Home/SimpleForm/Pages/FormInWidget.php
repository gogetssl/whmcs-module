<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\Home\SimpleForm\Pages;

use ModulesGarden\GGSModule\Components\DropdownMenu\DropdownMenu;
use ModulesGarden\GGSModule\Components\DropdownMenuItem\DropdownMenuItem;
use ModulesGarden\GGSModule\Components\Widget\Widget;
use ModulesGarden\GGSModule\Core\Components\Action;
use ModulesGarden\GGSModule\Core\Components\Enums\Color;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\DataTable\Modals\UserDelete;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\Home\SimpleForm\Forms\SimpleAbstractForm;

class FormInWidget extends Widget implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->setTitle('Form in widget');
        $this->addElement(new SimpleAbstractForm());

        $this->addToToolbar($this->createDropdown());
    }

    public function createDropdown()
    {
        return (new DropdownMenu())
            ->setName('dropdownmenu')
            ->addItem((new DropdownMenuItem())
                ->setIcon('delete')
                ->setTitle('XXXXXX')
                ->setType(Color::DANGER)
                ->onClick(Action::modalLoad(new UserDelete()))
            );
    }
}
