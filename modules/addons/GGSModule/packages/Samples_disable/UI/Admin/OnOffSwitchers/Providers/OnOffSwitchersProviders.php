<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\OnOffSwitchers\Providers;

use ModulesGarden\GGSModule\Core\DataProviders\CrudProvider;
use ModulesGarden\GGSModule\Packages\ModuleSettings\Support\Facades\ModuleSettings;

class OnOffSwitchersProviders extends CrudProvider
{
    public function read()
    {
        $this->data['switcherOnOff'] = ModuleSettings::get('OnOffSwitchers.switcherOnOff');
    }

    public function update()
    {
        ModuleSettings::save(['OnOffSwitchers.switcherOnOff' => $this->formData->get('switcherOnOff'),]);
    }
}