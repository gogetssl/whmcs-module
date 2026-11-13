<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\BasicElements\Modals;

use ModulesGarden\ggsmodule\Components\Alert\AlertDanger;
use ModulesGarden\ggsmodule\Components\Button\ButtonDanger;
use ModulesGarden\ggsmodule\Components\Modal\ModalDanger;
use ModulesGarden\ggsmodule\Core\Components\Action;
use ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\BasicElements\Modals\Forms\Confirm;


class DangerModals extends AbstractModals
{

    public function loadHtml(): void
    {
        parent::loadHtml();

        $this->setTitle('Danger Modals');

        $this->simple();
        $this->withForm();
        $this->withAlert();
        $this->withAlertAndForm();
    }

    protected function simple()
    {
        $modal = new ModalDanger();
        $modal->setTitle('Simple Modal');
        $modal->setContent('Wiesz co robisz?');

        $button = new ButtonDanger();
        $button->setTitle('Simple Modal');
        $button->onClick(Action::modalOpen($modal));

        $this->addToToolbar($button);
    }

    protected function withForm()
    {
        $modal = new ModalDanger();
        $modal->setTitle('Simple Modal With Form');
        $modal->setContent('Wiesz co robisz?');
        $modal->addElement(new Confirm());

        $button = new ButtonDanger();
        $button->setTitle('Simple Modal With Form');
        $button->onClick(Action::modalOpen($modal));

        $this->toolbar->addElement($button);
    }

    protected function withAlert()
    {
        $alert = new AlertDanger();
        $alert->setText('Wiesz co robisz?');

        $modal = new ModalDanger();
        $modal->setTitle('Simple Modal With Alert');
        $modal->addElement($alert);

        $button = new ButtonDanger();
        $button->setTitle('Simple Modal With Alert');
        $button->onClick(Action::modalOpen($modal));

        $this->toolbar->addElement($button);
    }

    protected function withAlertAndForm()
    {
        $alert = new AlertDanger();
        $alert->setText('Wiesz co robisz?');

        $modal = new ModalDanger();
        $modal->setTitle('Simple Modal With Alert');
        $modal->addElement($alert);
        $modal->addElement(new Confirm());

        $button = new ButtonDanger();
        $button->setTitle('Simple Modal With Alert');
        $button->onClick(Action::modalOpen($modal));

        $this->toolbar->addElement($button);
    }
}