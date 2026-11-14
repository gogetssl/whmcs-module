<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\DataTable\Buttons;

use ModulesGarden\GGSModule\Components\Button\ButtonCreate;
use ModulesGarden\GGSModule\Core\Components\Actions\ModalLoad;

class UserCreate extends ButtonCreate
{
    public function loadHtml(): void
    {
        parent::loadHtml();

        $this->onClick(new ModalLoad(new \ModulesGarden\GGSModule\Packages\Samples\UI\Admin\DataTable\Modals\UserCreate()));
    }
}
