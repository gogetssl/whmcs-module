<?php

namespace ModulesGarden\GGSModule\Core\Services;


class Request extends \ModulesGarden\GGSModule\Core\Http\Request
{
    public function getAll()
    {
        return $this->request->all();
    }
}
