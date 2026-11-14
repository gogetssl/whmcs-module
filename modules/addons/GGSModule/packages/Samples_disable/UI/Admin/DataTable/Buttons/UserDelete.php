<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\DataTable\Buttons;

use ModulesGarden\GGSModule\Components\IconButton;
use ModulesGarden\GGSModule\Core\Components\Action;

class UserDelete extends IconButton\IconButtonDelete
{
    public function loadHtml(): void
    {
        parent::loadHtml();

        $this->onClick(Action::modalOpen(new \ModulesGarden\GGSModule\Packages\Samples\UI\Admin\DataTable\Modals\UserDelete()));
    }
}
