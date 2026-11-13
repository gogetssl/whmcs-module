<?php

namespace ModulesGarden\ggsmodule\Core\Services;


class Request extends \ModulesGarden\ggsmodule\Core\Http\Request
{
    public function getAll()
    {
        return $this->request->all();
    }
}
