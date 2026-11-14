<?php

namespace ModulesGarden\GGSModule\Components\PageNotFound;

use ModulesGarden\GGSModule\Components\BlockZeroData\BlockZeroData;
use ModulesGarden\GGSModule\Components\Button\ButtonPrimary;
use ModulesGarden\GGSModule\Core\Components\Actions\RedirectToPreviousPage;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\ClientAreaInterface;

class PageNotFound extends BlockZeroData implements ClientAreaInterface, AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->setTitle($this->translate('title'));
        $this->setDescription($this->translate('description'));

        $button = new ButtonPrimary();
        $button->setTitle($this->translate('return_button'));
        $button->onClick(new RedirectToPreviousPage());
        $this->addElement($button);
    }
}
