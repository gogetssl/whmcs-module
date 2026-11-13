<?php

namespace ModulesGarden\ggsmodule\Core\Http\Admin;

use ModulesGarden\ggsmodule\Core\Http\AbstractController;

class PageNotFound extends AbstractController
{
    public function index()
    {
        $pageControler = new \ModulesGarden\ggsmodule\Core\App\Controllers\Http\PageNotFound();

        return $pageControler->execute();
    }
}
