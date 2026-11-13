<?php

namespace ModulesGarden\ggsmodule\App\UI\Admin\AutomationQueue\Index\DataTables\Queue\Providers;

use ModulesGarden\ggsmodule\App\Libs\AutoInstallQueue;
use ModulesGarden\ggsmodule\Core\DataProviders\CrudProvider;

class ResetTaskProvider extends CrudProvider
{
    public function update()
    {
        AutoInstallQueue::resetTask((int)$this->formData['id']);
    }
}
