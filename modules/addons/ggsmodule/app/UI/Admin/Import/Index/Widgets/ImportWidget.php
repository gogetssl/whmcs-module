<?php

namespace ModulesGarden\GGSModule\App\UI\Admin\Import\Index\Widgets;

use ModulesGarden\GGSModule\App\UI\Admin\Import\Index\Forms\ImportForm;
use ModulesGarden\GGSModule\Components\Alert\Alert;
use ModulesGarden\GGSModule\Components\Label\LabelDanger;
use ModulesGarden\GGSModule\Components\Link\Link;
use ModulesGarden\GGSModule\Components\Widget\Widget;
use ModulesGarden\GGSModule\Core\Components\Enums\Color;
use ModulesGarden\GGSModule\Core\WHMCS\Models\Currency;

class ImportWidget extends Widget
{
    public function loadHtml(): void
    {
        $this->addElement(new ImportForm());
    }
}