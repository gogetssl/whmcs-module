<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\DataTable\Buttons;

use ModulesGarden\ggsmodule\Components\IconButton;
use ModulesGarden\ggsmodule\Core\Components\Action;

class UserDelete extends IconButton\IconButtonDelete
{
    public function loadHtml(): void
    {
        parent::loadHtml();

        $this->onClick(Action::modalOpen(new \ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\DataTable\Modals\UserDelete()));
    }
}
