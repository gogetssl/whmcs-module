<?php

namespace ModulesGarden\GGSModule\App\UI\Admin\AutomationQueue\Index\DataTables\Queue\Providers;

use ModulesGarden\GGSModule\App\Libs\AutoInstallQueue;
use ModulesGarden\GGSModule\Core\DataProviders\CrudProvider;

class ResetTaskProvider extends CrudProvider
{
    public function update()
    {
        AutoInstallQueue::resetTask((int)$this->formData['id']);
    }
}
