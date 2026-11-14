<?php

namespace ModulesGarden\GGSModule\App\UI\Admin\Settings\Index\Widgets;

use ModulesGarden\GGSModule\App\UI\Admin\Settings\Index\Forms\ApiSettingsForm;
use ModulesGarden\GGSModule\App\UI\Admin\Settings\Index\Forms\SslSettingsForm;
use ModulesGarden\GGSModule\Components\Widget\Widget;

class AutomatedSettingsWidget extends Widget
{
    public function loadHtml(): void
    {
        $this->setTitle($this->translate('title'));
$this->setIcon('sync');
        $this->setSubtitle($this->translate('subtitle'));
        $this->addElement(new SslSettingsForm(false, SslSettingsForm::SCOPE_AUTOMATED));
    }
}