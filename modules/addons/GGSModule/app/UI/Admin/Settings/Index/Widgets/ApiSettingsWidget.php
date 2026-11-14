<?php

namespace ModulesGarden\GGSModule\App\UI\Admin\Settings\Index\Widgets;

use ModulesGarden\GGSModule\App\UI\Admin\Settings\Index\Forms\ApiSettingsForm;
use ModulesGarden\GGSModule\Components\Widget\Widget;

class ApiSettingsWidget extends Widget
{
    public function loadHtml(): void
    {
        $this->setTitle($this->translate('title'));
$this->setIcon('key-outline');
        $this->setSubtitle($this->translate('subtitle'));
        $this->addElement(new ApiSettingsForm());
    }
}