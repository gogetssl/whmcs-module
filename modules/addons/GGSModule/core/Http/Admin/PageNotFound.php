<?php

namespace ModulesGarden\GGSModule\Core\Http\Admin;

use ModulesGarden\GGSModule\Core\Http\AbstractController;

class PageNotFound extends AbstractController
{
    public function index()
    {
        $pageControler = new \ModulesGarden\GGSModule\Core\App\Controllers\Http\PageNotFound();

        return $pageControler->execute();
    }
}
