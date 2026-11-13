<?php

namespace ModulesGarden\ggsmodule\Core\App\Controllers\Instances\Http;

use ModulesGarden\ggsmodule\Core\App\Controllers\Instances\HttpController;
use ModulesGarden\ggsmodule\Core\Contracts\Controllers\AdminAreaInterface;
use ModulesGarden\ggsmodule\Core\Http\Response;
use ModulesGarden\ggsmodule\Core\Support\Facades\Params;

class Integration extends HttpController implements AdminAreaInterface
{
    protected $templateName = 'integration';

    public function execute($params = null)
    {
        Params::createFrom((array)$params);

        if (!$this->controllerResult)
        {
            return '';
        }

        return $this->resolveResponse();
    }

    public function resolveResponse()
    {
        if ($this->controllerResult instanceof Response)
        {
            $this->controllerResult->setForceHtml();
        }

        return $this->responseResolver->setResponse($this->controllerResult)
            ->setTemplateName($this->getTemplateName())
            ->setTemplateDir($this->getTemplateDir())
            ->setPageController($this)
            ->resolve();
    }
}
