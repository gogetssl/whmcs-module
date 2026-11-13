<?php

namespace ModulesGarden\ggsmodule\App\UI\Admin\Settings\Index\Widgets;

use ModulesGarden\ggsmodule\App\UI\Admin\Settings\Index\Forms\ApiSettingsForm;
use ModulesGarden\ggsmodule\App\UI\Admin\Settings\Index\Forms\FinanceSettingsForm;
use ModulesGarden\ggsmodule\App\UI\Admin\Settings\Index\Forms\SslSettingsForm;
use ModulesGarden\ggsmodule\Components\Widget\Widget;

class FinanceSettingsWidget extends Widget
{
    public function loadHtml(): void
    {
        $this->setTitle($this->translate('title'));
$this->setIcon('cash-multiple');
        $this->setSubtitle($this->translate('subtitle'));
        $this->addElement(new FinanceSettingsForm());
    }
}