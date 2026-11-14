<?php

namespace ModulesGarden\GGSModule\Packages\Logs\Http\Admin;

use ModulesGarden\GGSModule\Core\Contracts\Controllers\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Helper;
use ModulesGarden\GGSModule\Core\Http\AbstractController;
use ModulesGarden\GGSModule\Core\UI\View;
use ModulesGarden\GGSModule\Packages\Logs\UI\Pages\LogsDataTable;
use ModulesGarden\GGSModule\Packages\Logs\UI\Widgets\Summary;

class Logs extends AbstractController implements AdminAreaInterface
{
    /**
     * Example of static page
     * @return View
     */
    /** Ends debug mode before its time runs out (link with the admin token) */
    public function stopDebug()
    {
        if(\ModulesGarden\GGSModule\App\Libs\CsrfToken::valid($_REQUEST['token'] ?? ''))
        {
            \ModulesGarden\GGSModule\App\Libs\GeneralSettings::save(['debugServices' => '', 'debugUntil' => 0]);
        }

        return Helper\redirect('logs', 'index');
    }

    public function index()
    {
        return Helper\view()
            ->addElement(Summary::class)
            ->addElement(LogsDataTable::class);
    }
}
