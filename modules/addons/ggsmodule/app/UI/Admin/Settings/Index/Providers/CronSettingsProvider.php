<?php

namespace ModulesGarden\GGSModule\App\UI\Admin\Settings\Index\Providers;

use ModulesGarden\GGSModule\App\Libs\Helpers;
use ModulesGarden\GGSModule\App\Repositories\Whmcs\AddonModuleRepository;
use ModulesGarden\GGSModule\Core\DataProviders\CrudProvider;
use ModulesGarden\GGSModule\Core\Support\Facades\Validator;


class CronSettingsProvider extends CrudProvider
{
    public function read()
    {
        $moduleRepository    = new AddonModuleRepository();
        $moduleConfiguration = $moduleRepository->getModuleConfiguration();

        foreach($moduleConfiguration['cronSettings'] as $key => $value)
        {
            $this->data[$key] = $value;
        }
    }

    public function update()
    {
        $data = $this->formData->toArray();
        (new AddonModuleRepository)->saveCronSettings($data);
    }
}