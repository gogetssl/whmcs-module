<?php

namespace ModulesGarden\ggsmodule\App\UI\Admin\Settings\Index\Widgets;

use ModulesGarden\ggsmodule\App\UI\Admin\Settings\Index\Forms\ApiSettingsForm;
use ModulesGarden\ggsmodule\App\UI\Admin\Settings\Index\Forms\SslSettingsForm;
use ModulesGarden\ggsmodule\Components\Widget\Widget;

class SslSettingsWidget extends Widget
{
    public function loadHtml(): void
    {
        $this->setTitle($this->translate('title'));
$this->setIcon('shield-check-outline');
        $this->setSubtitle($this->translate('subtitle'));
        $this->addElement(new SslSettingsForm(false, SslSettingsForm::SCOPE_SSL));
    }
}