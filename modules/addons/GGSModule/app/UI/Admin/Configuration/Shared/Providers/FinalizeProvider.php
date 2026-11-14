<?php

namespace ModulesGarden\GGSModule\App\UI\Admin\Configuration\Shared\Providers;

use ModulesGarden\GGSModule\App\Repositories\Whmcs\AddonModuleRepository;
use ModulesGarden\GGSModule\Core\DataProviders\CrudProvider;
use ModulesGarden\GGSModule\Core\Components\Response\Response;
use ModulesGarden\GGSModule\Core\Components\Actions\Redirect;
use ModulesGarden\GGSModule\Core\Routing\Url;

class FinalizeProvider extends CrudProvider
{
    public function read()
    {

    }

    public function update()
    {
        (new AddonModuleRepository())->finalize();
        // legacy modules chosen for migration: continue on the migration page
        $page = \ModulesGarden\GGSModule\App\Migration\Choice::toMigrate() ? 'migration' : 'home';
        return (new Response())->setSuccess($this->translate('successFinalize'))->setActions([new Redirect(Url::route('',
            ['module' => 'GGSModule', 'mg-page' => $page, 'mg-action' => 'index']
        ))]);

    }

}