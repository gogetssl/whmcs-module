<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\DataTable\Buttons;

use ModulesGarden\ggsmodule\Components\Button\ButtonCreate;
use ModulesGarden\ggsmodule\Core\Components\Actions\ModalLoad;

class UserCreate extends ButtonCreate
{
    public function loadHtml(): void
    {
        parent::loadHtml();

        $this->onClick(new ModalLoad(new \ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\DataTable\Modals\UserCreate()));
    }
}
