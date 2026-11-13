<?php

namespace ModulesGarden\ggsmodule\Packages\Product\UI\Modals;

use ModulesGarden\ggsmodule\Components\Modal\ModalEdit;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\ggsmodule\Core\Support\Facades\Config;
use ModulesGarden\ggsmodule\Packages\Product\Enums\ConfigSettings;

class ServerConfiguration extends ModalEdit implements AdminAreaInterface, AjaxComponentInterface
{
    public function loadHtml(): void
    {
        $this->setTitle($this->translate('modal.title'));

        $serverConfigForm = Config::get(ConfigSettings::PRODUCT_SERVER_CONFIG_FORM);

        $this->addElement(new $serverConfigForm());
    }
}