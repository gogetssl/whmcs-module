<?php

namespace ModulesGarden\GGSModule\Packages\Product\UI\Modals;

use ModulesGarden\GGSModule\Components\Modal\ModalEdit;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\GGSModule\Core\Support\Facades\Config;
use ModulesGarden\GGSModule\Packages\Product\Enums\ConfigSettings;

class CreateConfigurableOptions extends ModalEdit implements AdminAreaInterface, AjaxComponentInterface
{
    public function loadHtml(): void
    {
        $this->setSize(Config::get(ConfigSettings::CONFIG_OPTIONS_MODAL_SIZE, ""));
        $this->addElement(new \ModulesGarden\GGSModule\Packages\Product\UI\Forms\CreateConfigurableOptions());
    }
}