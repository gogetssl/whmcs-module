<?php

namespace ModulesGarden\ggsmodule\App\UI\Admin\Configuration\Shared\Forms;

use ModulesGarden\ggsmodule\App\UI\Admin\Configuration\Shared\Providers\FinalizeProvider;
use ModulesGarden\ggsmodule\Components\Button\ButtonSuccess;
use ModulesGarden\ggsmodule\Components\Form\Form;
use ModulesGarden\ggsmodule\Core\Components\Actions\FormSubmit;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\ggsmodule\Components\Toolbar\Toolbar;


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