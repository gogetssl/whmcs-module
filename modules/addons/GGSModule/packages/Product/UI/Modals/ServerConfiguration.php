<?php

namespace ModulesGarden\GGSModule\Packages\Product\UI\Modals;

use ModulesGarden\GGSModule\Components\Modal\ModalEdit;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\GGSModule\Core\Support\Facades\Config;
use ModulesGarden\GGSModule\Packages\Product\Enums\ConfigSettings;

class ServerConfiguration extends ModalEdit implements AdminAreaInterface, AjaxComponentInterface
{
    public function loadHtml(): void
    {
        $this->setTitle($this->translate('modal.title'));

        $serverConfigForm = Config::get(ConfigSettings::PRODUCT_SERVER_CONFIG_FORM);

        $this->addElement(new $serverConfigForm());
    }
}