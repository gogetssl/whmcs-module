<?php

namespace ModulesGarden\GGSModule\App\UI\Admin\Configuration\Shared\Forms;

use ModulesGarden\GGSModule\App\UI\Admin\Configuration\Shared\Providers\FinalizeProvider;
use ModulesGarden\GGSModule\Components\Button\ButtonSuccess;
use ModulesGarden\GGSModule\Components\Form\Form;
use ModulesGarden\GGSModule\Core\Components\Actions\FormSubmit;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\GGSModule\Components\Toolbar\Toolbar;


class FinalizeForm extends Form implements AdminAreaInterface, AjaxComponentInterface
{
    public function __construct()
    {
        parent::__construct();

        $this->provider       = FinalizeProvider::class;
        $this->providerAction = FinalizeProvider::ACTION_UPDATE;
    }

    public function loadHtml(): void
    {
        $toolbar = new Toolbar();
        $toolbar->addElement(
            (new ButtonSuccess())
                ->setId('buttonSave')
                ->setTitle($this->translate('finalize'))
                ->onClick(new FormSubmit($this))
        );
        $this->addElement($toolbar);
    }
}