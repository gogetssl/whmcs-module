<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\DataTable\Buttons;

use ModulesGarden\GGSModule\Components\IconButton;
use ModulesGarden\GGSModule\Core\Components\Actions\ModalLoad;

class UserEdit extends IconButton\IconButtonEdit
{
    public function loadHtml(): void
    {
        $this->onClick(new ModalLoad(new \ModulesGarden\GGSModule\Packages\Samples\UI\Admin\DataTable\Modals\UserEdit()));
    }
}
