<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\BasicElements\Modals;

use ModulesGarden\ggsmodule\Components\Alert\AlertEdit;
use ModulesGarden\ggsmodule\Components\Alert\AlertSuccess;
use ModulesGarden\ggsmodule\Components\Button\ButtonEdit;
use ModulesGarden\ggsmodule\Components\Button\ButtonPrimary;
use ModulesGarden\ggsmodule\Components\Modal\ModalEdit;
use ModulesGarden\ggsmodule\Core\Components\Action;
use ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\BasicElements\Modals\Forms\Confirm;


class EditModals extends AbstractModals
{

    public function loadHtml(): void
    {
        parent::loadHtml();

        $this->setTitle('Edit Modals');

        $this->withForm();
        $this->withAlertAndForm();
    }

    protected function withForm()
    {
        $modal = new ModalEdit();
        $modal->setTitle('Simple Modal With Form');
        $modal->addElement(new Confirm());

        $button = new ButtonPrimary();
        $button->setTitle('Simple Modal With Form');
        $button->onClick(Action::modalOpen($modal));

        $this->addToToolbar($button);
    }

    protected function withAlertAndForm()
    {
        $alert = new AlertSuccess();
        $alert->setText('Wiesz co robisz?');

        $modal = new ModalEdit();
        $modal->setTitle('Simple Modal With Alert');
        $modal->addElement($alert);
        $modal->addElement(new Confirm());

        $button = new ButtonPrimary();
        $button->setTitle('Simple Modal With Alert');
        $button->onClick(Action::modalOpen($modal));

        $this->toolbar->addElement($button);
    }
}