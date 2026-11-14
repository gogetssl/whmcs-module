<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\HintsBox\Providers;

use ModulesGarden\GGSModule\Core\DataProviders\CrudProvider;
use ModulesGarden\GGSModule\Packages\ModuleSettings\Support\Facades\ModuleSettings;

class SettingsProvider extends CrudProvider
{
    public function read()
    {
        $this->data['hideGuide'] = ModuleSettings::get('HintsBox.hide_guide');
    }

    public function update()
    {
        ModuleSettings::save(['HintsBox.hide_guide' => $this->formData->get('hideGuide'),]);
    }
}