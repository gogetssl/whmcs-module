<?php

namespace ModulesGarden\ggsmodule\App\UI\Admin\Configuration\Shared\Providers;

use ModulesGarden\ggsmodule\App\Repositories\Whmcs\AddonModuleRepository;
use ModulesGarden\ggsmodule\Core\DataProviders\CrudProvider;
use ModulesGarden\ggsmodule\Core\Components\Response\Response;
use ModulesGarden\ggsmodule\Core\Components\Actions\Redirect;
use ModulesGarden\ggsmodule\Core\Routing\Url;

class FinalizeProvider extends CrudProvider
{
    public function read()
    {

    }

    public function update()
    {
        (new AddonModuleRepository())->finalize();
        // legacy modules chosen for migration: continue on the migration page
        $page = \ModulesGarden\ggsmodule\App\Migration\Choice::toMigrate() ? 'migration' : 'home';
        return (new Response())->setSuccess($this->translate('successFinalize'))->setActions([new Redirect(Url::route('',
            ['module' => 'ggsmodule', 'mg-page' => $page, 'mg-action' => 'index']
        ))]);

    }

}