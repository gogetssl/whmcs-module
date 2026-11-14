<?php

namespace ModulesGarden\GGSModule\App\Http\Client;

use ModulesGarden\GGSModule\Core\Helper;
use ModulesGarden\GGSModule\Core\Http\AbstractClientController;
use ModulesGarden\GGSModule\Packages\Logs\UI\Pages\LogsDataTable;

/**
 * Description of Samples
 */
class Home extends AbstractClientController implements \ModulesGarden\GGSModule\Core\Contracts\Controllers\ClientAreaInterface
{
    public function index()
    {
        return Helper\view()
            ->addElement(\ModulesGarden\GGSModule\App\UI\Client\Home\Index\Container::class);
    }

    public function serviceInformation()
    {
        return Helper\view()
            ->addElement(\ModulesGarden\GGSModule\App\UI\Client\Home\ServiceInformation\Container::class);
    }
}
