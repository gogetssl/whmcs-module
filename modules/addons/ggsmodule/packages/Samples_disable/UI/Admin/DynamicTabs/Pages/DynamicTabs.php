<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\DynamicTabs\Pages;

use ModulesGarden\GGSModule\Components\MarkdownEditor\MarkdownEditor;
use ModulesGarden\GGSModule\Components\Tab\Tab;
use ModulesGarden\GGSModule\Components\TabsWidget\TabsWidget;
use ModulesGarden\GGSModule\Components\IconButton\IconButton;
use ModulesGarden\GGSModule\Core\Components\Actions\ModalLoad;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\GGSModule\Packages\ModuleSettings\Support\Facades\ModuleSettings;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\DynamicTabs\Modals\EditTabsModal;

class DynamicTabs extends TabsWidget implements AdminAreaInterface, AjaxComponentInterface
{
    public function loadHtml(): void
    {
        $this->setTitle("Dynamic Tabs Sample");

        $tabsNames = json_decode(ModuleSettings::get('samples.dynamicTabsNames')) ?: [];

        asort($tabsNames);

        array_unshift($tabsNames, "Default Tab");

        foreach ($tabsNames as $tabsName)
        {
            $tab = new Tab();
            $tab->setTitle($tabsName);
            $tab->addElement(new MarkdownEditor());
            $this->addTab($tab);
        }

        $this->addToToolbar((new IconButton())
            ->setTitle("Edit")
            ->setIcon("plus")
            ->onClick(new ModalLoad(new EditTabsModal)));
    }
}