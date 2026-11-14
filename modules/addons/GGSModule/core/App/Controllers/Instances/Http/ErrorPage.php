<?php

namespace ModulesGarden\GGSModule\Core\App\Controllers\Instances\Http;

use ModulesGarden\GGSModule\Core\App\Controllers\Instances\HttpController;
use ModulesGarden\GGSModule\Core\Contracts\Controllers\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Controllers\ClientAreaInterface;
use ModulesGarden\GGSModule\Core\Http\JsonResponse;
use ModulesGarden\GGSModule\Core\Support\Facades\Params;
use ModulesGarden\GGSModule\Core\Support\Facades\Request;
use ModulesGarden\GGSModule\Core\UI\View;

//@todo refactor
class ErrorPage extends HttpController implements AdminAreaInterface, ClientAreaInterface
{
    public function execute($params = null)
    {
        Params::createFrom((array)$params);

        return $this->resolveResponse();
    }

    public function resolveResponse()
    {
        if (Request::get('ajax'))
        {
            return (new JsonResponse())->withError(Params::get('exception')->getMessage());
        }
        else
        {
            $error = new \ModulesGarden\GGSModule\Components\BlockError\BlockError();
            $error->setException(Params::get('exception'));

            $view = new View();
            $view->addElement($error);

            return $view;
        }
    }
}
