<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\DynamicTabs\Modals;

use ModulesGarden\ggsmodule\Components\Modal\ModalEdit;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\DynamicTabs\Forms\EditTabsForm;

class EditTabsModal extends ModalEdit implements AdminAreaInterface, AjaxComponentInterface
{
    public function loadHtml(): void
    {
        $this->setTitle('Edit Tabs');
        $this->addElement(new EditTabsForm());
    }
}