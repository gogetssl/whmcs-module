<?php

namespace ModulesGarden\GGSModule\Core\App\Controllers\Instances\Http;

use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\ClientAreaInterface;
use ModulesGarden\GGSModule\Core\UI\View;

//@todo refactor me
class PageNotFound extends View implements AdminAreaInterface, ClientAreaInterface
{
    public function __construct()
    {
        parent::__construct();

        $zero = new \ModulesGarden\GGSModule\Components\PageNotFound\PageNotFound();
        $this->addElement($zero);
    }
}
