<?php

namespace ModulesGarden\ggsmodule\App\Http\Client;

use ModulesGarden\ggsmodule\Core\Helper;
use ModulesGarden\ggsmodule\Core\Http\AbstractClientController;
use ModulesGarden\ggsmodule\Packages\Logs\UI\Pages\LogsDataTable;

/**
 * Description of Samples
 */
class Home extends AbstractClientController implements \ModulesGarden\ggsmodule\Core\Contracts\Controllers\ClientAreaInterface
{
    public function index()
    {
        return Helper\view()
            ->addElement(\ModulesGarden\ggsmodule\App\UI\Client\Home\Index\Container::class);
    }

    public function serviceInformation()
    {
        return Helper\view()
            ->addElement(\ModulesGarden\ggsmodule\App\UI\Client\Home\ServiceInformation\Container::class);
    }
}
