<?php

namespace ModulesGarden\GGSModule\Fragments\ConfigurableHintBox\UI\Modals;

use ModulesGarden\GGSModule\Components\Modal\ModalEdit;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\GGSModule\Fragments\ConfigurableHintBox\UI\Forms\EditConfigurationForm;

class EditConfigurationModal extends ModalEdit implements AdminAreaInterface, AjaxComponentInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new EditConfigurationForm());
        $this->setTitle($this->translate('title'));
    }
}