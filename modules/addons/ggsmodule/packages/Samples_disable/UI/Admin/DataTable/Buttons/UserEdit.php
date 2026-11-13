<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\DataTable\Buttons;

use ModulesGarden\ggsmodule\Components\IconButton;
use ModulesGarden\ggsmodule\Core\Components\Actions\ModalLoad;

class UserEdit extends IconButton\IconButtonEdit
{
    public function loadHtml(): void
    {
        $this->onClick(new ModalLoad(new \ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\DataTable\Modals\UserEdit()));
    }
}
