<?php

namespace ModulesGarden\ggsmodule\App\UI\Admin\Import\Index\Widgets;

use ModulesGarden\ggsmodule\App\UI\Admin\Import\Index\Forms\ImportForm;
use ModulesGarden\ggsmodule\Components\Alert\Alert;
use ModulesGarden\ggsmodule\Components\Label\LabelDanger;
use ModulesGarden\ggsmodule\Components\Link\Link;
use ModulesGarden\ggsmodule\Components\Widget\Widget;
use ModulesGarden\ggsmodule\Core\Components\Enums\Color;
use ModulesGarden\ggsmodule\Core\WHMCS\Models\Currency;

class ImportWidget extends Widget
{
    public function loadHtml(): void
    {
        $this->addElement(new ImportForm());
    }
}