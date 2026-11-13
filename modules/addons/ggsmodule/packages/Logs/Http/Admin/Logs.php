<?php

namespace ModulesGarden\ggsmodule\Packages\Logs\Http\Admin;

use ModulesGarden\ggsmodule\Core\Contracts\Controllers\AdminAreaInterface;
use ModulesGarden\ggsmodule\Core\Helper;
use ModulesGarden\ggsmodule\Core\Http\AbstractController;
use ModulesGarden\ggsmodule\Core\UI\View;
use ModulesGarden\ggsmodule\Packages\Logs\UI\Pages\LogsDataTable;
use ModulesGarden\ggsmodule\Packages\Logs\UI\Widgets\Summary;

class Logs extends AbstractController implements AdminAreaInterface
{
    /**
     * Example of static page
     * @return View
     */
    /** Ends debug mode before its time runs out (link with the admin token) */
    public function stopDebug()
    {
        if(\ModulesGarden\ggsmodule\App\Libs\CsrfToken::valid($_REQUEST['token'] ?? ''))
        {
            \ModulesGarden\ggsmodule\App\Libs\GeneralSettings::save(['debugServices' => '', 'debugUntil' => 0]);
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
