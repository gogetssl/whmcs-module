<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\DynamicTabs\Modals;

use ModulesGarden\GGSModule\Components\Modal\ModalEdit;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\DynamicTabs\Forms\EditTabsForm;

class EditTabsModal extends ModalEdit implements AdminAreaInterface, AjaxComponentInterface
{
    public function loadHtml(): void
    {
        $this->setTitle('Edit Tabs');
        $this->addElement(new EditTabsForm());
    }
}