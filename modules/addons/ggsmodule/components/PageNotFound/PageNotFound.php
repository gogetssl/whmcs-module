<?php

namespace ModulesGarden\ggsmodule\Components\PageNotFound;

use ModulesGarden\ggsmodule\Components\BlockZeroData\BlockZeroData;
use ModulesGarden\ggsmodule\Components\Button\ButtonPrimary;
use ModulesGarden\ggsmodule\Core\Components\Actions\RedirectToPreviousPage;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\ggsmodule\Core\Contracts\Components\ClientAreaInterface;

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
