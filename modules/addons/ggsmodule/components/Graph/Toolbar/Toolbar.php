<?php

namespace ModulesGarden\GGSModule\Components\Graph\Toolbar;

use ModulesGarden\GGSModule\Core\Support\Facades\Translator;
use ModulesGarden\GGSModule\Components\Form\AbstractForm;
use ModulesGarden\GGSModule\Components\IconButton\IconButtonEdit;
use ModulesGarden\GGSModule\Components\Modal\ModalEdit;
use ModulesGarden\GGSModule\Core\Components\Action;

class Toolbar extends \ModulesGarden\GGSModule\Components\Toolbar\Toolbar
{
    protected AbstractForm $form;

    public function loadHtml(): void
    {
        if (!isset($this->form))
        {
            return;
        }

        $this->form->onSubmit(Action::reloadParent());

        $modal = new ModalEdit();
        $modal->setTitle(Translator::getBasedOnNamespaces([get_class($this->form), ModalEdit::class], 'title'));
        $modal->addElement($this->form);

        $icon = new IconButtonEdit();
        $icon->setTitle(Translator::getBasedOnNamespaces([get_class($this->form) . "\EditButton", IconButtonEdit::class], 'title'));
        $icon->onClick(Action::modalOpen($modal));

        $this->addElement($icon);
    }

    public function setForm(AbstractForm $form):self
    {
        $this->form = $form;

        return $this;
    }
}
