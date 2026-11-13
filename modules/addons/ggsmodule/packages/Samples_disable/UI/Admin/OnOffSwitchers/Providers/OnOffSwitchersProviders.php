<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\OnOffSwitchers\Providers;

use ModulesGarden\ggsmodule\Core\DataProviders\CrudProvider;
use ModulesGarden\ggsmodule\Packages\ModuleSettings\Support\Facades\ModuleSettings;

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